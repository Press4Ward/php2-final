<?php 
// required files and databases
require('../model/database.php');
require('../model/comments.php');
require('../model/replies.php');
//require('../util/main.php');
//require('../util.tags.php');


//action to list replies
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_replies';
    }
}
// ADD SWITCH STATEMENTS FOR EACH OF THE ABOVE functions which will link back to functions on the model pages

switch ($action) {
    case 'list_replies' : // get all comments function
        $reply_id = filter_input(INPUT_GET, 'reply_id', FILTER_VALIDATE_INT);
        if ($reply_id == NULL || $reply_id == FALSE) {
        $reply_id = 1;
        }
        $reply = get_all_replies();
        include('../comments_manager/list_comments.php');
        break;
    case 'add_reply' : // add reply function
        $userid = filter_input(INPUT_POST, 'userid', FILTER_VALIDATE_INT);
        $dateTime = filter_intput(INPUT_POST, 'dateTime');
        $comment = filter_input(INPUT_POST, 'comment');
        $comment_id = filter_input(INPUT_POST, 'comment_id');
        if ($userid == NULL || $userid == FALSE || $dateTime == NULL || $dateTime == FALSE || $comment == NULL || $comment == FALSE || $comment_id == TRUE || $comment_id == FALSE) {
            $error = "User not logged in. Please login to reply.";
            include('../comments_manager/list_comments.php');
        } else {
            add_reply($userid, $dateTime, $comment, $comment_id);
            header("Location: .?userid=$userid");
        }
        break;
    case 'delete_reply' : // delete reply function
        $reply_id = filter_input(INPUT_POST, 'reply_id', FILTER_VALIDATE_INT);
        if ($reply_id == NULL || $reply_id == FALSE) {
            $error = "User not logged in, please login to delete reply.";
            include('../comments_manager/list_comments.php');
        } else {
            delete_reply($reply_id);
            header("Location: .?reply_id=$reply_id");
        }
        break;
    case 'retrieve_reply' : // retrieve reply function
        $reply_id = filter_input(INPUT_POST, 'reply_id', FILTER_VALIDATE_INT);
        if ($reply_id == NULL || $reply_id == FALSE) {
            $error = "oops...what happened?";
            include('../comments_manager/list_comments.php');
        } else {
            retrieve_reply($reply_id);
            header("Location: .?reply_id=$reply_id");
        }
        break;
    case 'edit_reply' : // edit reply function
        $reply_id = filter_input(INPUT_POST, 'reply_id', FILTER_VALIDATE_INT);
        $newDateTime = filter_input(INPUT_POST, 'dateTime');
        $reply = filter_input(INPUT_POST, 'reply');
        if ($reply_id == NULL || $reply_id == FALSE || $dateTime == NULL || $dateTime == FALSE || $reply == NULL || $reply == $FALSE) {
            $error = "Snap...you can't edit until you login. Please log in now.";
            include('../comments_manager/list_comments.php');
        }
        break;

}

// Query to retrieves result set of 2 or more comments from comments_db --FOREACH LOOP FOR COMMENTS
    $query_c = 'SELECT comment, dateTime, userid FROM comments WHERE comment = :comment';
    $statement = $db->prepare($query_c);
    $statement->bindValue("comment", "dateTime", "userid");
    $statement->execute();
    $comments = $statement->fetchAll();
    $row_count = $statement->row_count();
    $statement->closeCursor();


// Query to retrieves result set of 2 or more replies from replys_db --FOREACH LOOP FOR REPLIES
    $query_r = 'SELECT reply, dateTime, userid FROM replies WHERE reply = :reply';
    $statement = $db->prepare($query_r);
    $statement->bindValue("reply", "dateTime", "userid");
    $statement->execute();
    $replies = $statement->fetchAll();
    $row_count = $statement->row_count();
    $statement->closeCursor();

// get_all_comments();

// add_comment($userid, $dateTime, $comment);

// delete_comment($comment_id) ;

// retrieve_comment($comment_id) ;

// edit_comment($comment_id, $dateTime, $comment);



include './css/style.css';
?>

<?php include './view/footer.php'; ?>