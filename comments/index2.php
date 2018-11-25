<?php
require('../model/database.php');
require('../model/comments.php');
//require('../model/replies.php');

// action to list comments
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'get_comments';
    }
}

// get all comments
if($action == 'get_comments') {
    $comment_id = filter_input(INPUT_GET, 'comment_id', FILTER_VALIDATE_INT);
    if ($comment_id == NULL || $comment_id == FALSE) {
        $comment_id = 1;
    }
    $results = get_comments();
    include('list_comments2.php');
} else if ($action == 'delete_comment') { // delete comment
    $comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);
    if ($comment_id == NULL || $comment_id == FALSE) {
        $error = "Must be logged in to delete comment.";
        include('../errors/error.php');
    } else {
        delete_comment($comment_id);
        header("Location: .");
    }
} else if ($action == 'add_comment') {  // userid, dateTime, comment
    $userid = filter_input(INPUT_POST, 'userid');
    $dateTime = filter_input(INPUT_POST, 'dateTime');
    $comment = filter_input(INPUT_POST, 'comment');

    if ($userid == NULL || $userid == FALSE || $dateTime == NULL || $dateTime == FALSE || $comment == NULL || $comment == FALSE) {
        $error = "Please log in to add comment.";
        include('../errors/error.php');
    } else {
        add_comment($userid, $dateTime, $comment);
        header("Location: .");
    }

}
?>