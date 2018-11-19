<?php 
// required files and databases
require('../model/database.php');
require('../model/comments_db.php');
//require('../model/replies_db.php');
//require('../util/main.php');
//require('../util.tags.php');


//action to list comments
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_comments';
    }
}
// ADD SWITCH STATEMENTS FOR EACH OF THE ABOVE functions which will link back to functions on the model pages

switch ($action) {
    case 'list_comments' : // get all comments function
        $comment_id = filter_input(INPUT_GET, 'comment_id', FILTER_VALIDATE_INT);
        if ($comment_id == NULL || $comment_id == FALSE) {
        $comment_id = 1;
        }
        $comment = get_all_comments();
        include('../list_comments.php');
        break;
    case 'add_comment' : // add comments function
        $userid = filter_input(INPUT_POST, 'userid', FILTER_VALIDATE_INT);
        $dateTime = filter_intput(INPUT_POST, 'dateTime');
        $comment = filter_input(INPUT_POST, 'comment');
        if ($userid == NULL || $userid == FALSE || $dateTime == NULL || $dateTime == FALSE || $comment == NULL || $comment == FALSE) {
            $error = "User not logged in. Please login to comment.";
            include('list_comments.php');
        } else {
            add_comment($userid, $dateTime, $comment);
            header("Location: .?userid=$userid");
        }
        break;
    case 'delete_comment' : // delete comments function
        $comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);
        if ($comment_id == NULL || $comment_id == FALSE) {
            $error = "User not logged in, please login to delete comment.";
            include('list_comments.php');
        } else {
            delete_comment($comment_id);
            header("Location: .?comment_id=$comment_id");
        }
        break;
    case 'retrieve_comment' : // retrieve comments function
        $comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);
        if ($comment_id == NULL || $comment_id == FALSE) {
            $error = "oops...what happened?";
            include('../list_comments.php');
        } else {
            retrieve_comment($comment_id);
            header("Location: .?comment_id=$comment_id");
        }
        break;
    case 'edit_comment' : // edit comments function
        $comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);
        if ($comment_id == NULL || $comment_id == FALSE || $dateTime == NULL || $dateTime == FALSE || $comment == NULL || $comment == $FALSE) {
            $error = "Snap...you can't edit until you login. Please log in now.";
            include('list_comments.php');
        }
        break;

}

// Query to retrieves result set of 2 or more comments from comments_db --FOREACH LOOP FOR COMMENTS
$query_c = 'SELECT comment, dateTime, userid FROM comments WHERE comment = :comment';
$statement = $db->prepare($query_c);
$statement->bindValue('comment', 'dateTime', 'userid');
$statement->execute();
$comments = $statement->fetchAll();
$row_count = $statement->row_count();
$statement->closeCursor();


// Query to retrieves result set of 2 or more replies from replys_db --FOREACH LOOP FOR REPLIES
$query_r = 'SELECT reply, dateTime, userid FROM replies WHERE reply = :reply';
$statement = $db->prepare($query_r);
$statement->bindValue('reply', 'dateTime', 'userid');
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