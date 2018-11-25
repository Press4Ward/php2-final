<?php

// function to get comments from comments database
function get_comments() {
    global $db;
    $query = 'SELECT * FROM comments ORDER BY dateTime DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $count = $statement->rowCount();
        $statement->closeCursor();
        return array($count, $results);
}

// function to add comments to comments database
function add_comment($userid, $dateTime, $comment) {
    global $db;
    $query ='INSERT INTO comments 
                (userid, dateTime, comment)
            VALUES
                (:userid, :dateTime, :comment,';
        $statement = $db->prepare($query);
        $statement->bindValue(':userid', $userid);
        $statement->bindValue(':dateTime', $dateTime);
        $statement->bindValue(':comment', $comment);
        $statement->execute();
        $statement->closeCursor();
}


// function to edit comments
function edit_comment($comment_id, $dateTime, $comment) {
    global $db;
    $query = 'UPDATE comments 
                SET comment = $comment
                WHERE comment_id = :comment_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':comment_id', $comment_id);
        $statement->bindValue(':dateTime', $dateTime);
        $statement->bindValue(':comment', $comment);
        $statement->execute();
        $statement->closeCursor();
}

// function to delete comments
function delete_comment($comment_id) {
    global $db;
    $query = 'DELETE FROM comments 
                WHERE comment_id = :comment_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':comment_id', $comment_id);
        $statement->execute();
        $statement->closeCursor();
        //return $row_count;
}

?>