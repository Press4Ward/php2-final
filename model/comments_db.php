<?php

// function to get comments to comments_db
function get_all_comments() {
    global $db;
    $query = 'SELECT * FROM comments ORDER BY dateTime desc';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOExeception $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

// function to add comments to comments_db database
function add_comment($userid, $dateTime, $comment) {
    global $db;
    $query ='INSERT INTO comments 
                (userid, dateTime, comment)
            VALUES
                (:userid, :dateTime, :comment,';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':userid', $userid);
        $statement->bindValue(':dateTime', $dateTime);
        $statement->bindValue(':comment', $comment);
        $statement->execute();
        $statement->closeCursor();

        } catch (PDOException $e) {
           $error_message = $e->getMessage();
           display_db_error($error_message);
     }
}

// function to delete comments
function delete_comment($comment_id) {
    global $db;
    $query = 'DELETE FROM comments 
                WHERE comment_id = :comment_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':comment_id', $comment_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOExeception $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

// function to retrive comments
function retrieve_comment($comment_id) {
    global $db;
    $query = 'SELECT FROM comments 
                WHERE comment_id = :comment_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':comment_id', $comment_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
    } catch (PDOExeception $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

// function to edit comments
function edit_comment($comment_id, $dateTime, $comment) {
    global $db;
    $query = 'UPDATE comments 
                SET comment = $comment
                WHERE comment_id = :comment_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':comment_id', $comment_id);
        $statement->bindValue(':dateTime', $dateTime);
        $statement->bindValue(':comment', $comment);
        $statement->closeCursor();
    } catch (PDOExeception $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>