<?php
// function to get replies by user
// reply_id is auto incremented and should return in ascending order


// function to get replies to replies_db
function get_all_replies() {
    global $db;
    $query = 'SELECT * FROM replies ORDER BY dateTime ASC';
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

// function to add replies to replies_db database
function add_reply($userid, $dateTime, $comment, $comment_id) {
    global $db;
    $query ='INSERT INTO replies 
                (userid, dateTime, reply)
            VALUES
                (:userid, :dateTime, :reply,';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':userid', $userid);
        $statement->bindValue(':dateTime', $dateTime);
        $statement->bindValue(':comment', $comment_id);
        $statement->bindValue(':comment', $comment_id);
        $statement->execute();
        $statement->closeCursor();
        } catch (PDOException $e) {
           $error_message = $e->getMessage();
           display_db_error($error_message);
     }
}

// function to delete replies
function delete_reply($reply_id) {
    global $db;
    $query = 'DELETE FROM replies 
                WHERE reply_id = :reply_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':reply_id', $reply_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOExeception $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

// function to retrive comments
function retrieve_reply($reply_id) {
    global $db;
    $query = 'SELECT FROM replies
                WHERE reply_id = :replies_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':replies_id', $replies_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
    } catch (PDOExeception $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

// function to edit replies
function edit_reply($reply_id, $dateTime, $reply) {
    global $db;
    $query = 'UPDATE replies 
                SET replies = $reply
                WHERE reply_id = :reply_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':reply_id', $reply_id);
        $statement->bindValue(':dateTime', $dateTime);
        $statement->bindValue(':reply', $reply);
        $statement->closeCursor();
    } catch (PDOExeception $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>