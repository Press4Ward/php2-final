<?php 

//start session
    session_start();

// retrieve databases
require('../model/database.php');
require('../model/users_db.php');

// define empty variables for userid, password, $comment, $reply
$userid = $password = $comment = $reply = "";

// get user-id and password from users database
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = filter_input(INPUT_POST, 'userid');
    $password = filter_input(INPUT_POST, 'password');

    //retrieve password from users database
    $query = "SELECT * FROM users
                WHERE userid = :userid";
    $statement = $db->prepare($query);
    $statement->bindValue(':userid', $userid);
    $statement->execute();
    $user = $statement->fetch();
}

// function to test password input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;


// validate password is correct
    $verify_password = password_verify($password, $userid);

//if password is valid pull user info from table
    if ($valid_password) {
        $user = get_current_user($userid, $password);
        $_SESSION["userid"] = $userid;
        $_SESSION["password"] = $password;
        header("Location:. /comments/list_comments.php"); // show main page with comments and replies
        exit();
    } else {
        $password_message = '<label class="errorMsg">Wrong password, please try again.</label>';
    }  // close password error message
// close pull userid and password from users database
}

// show the list_comments.php page with blog, comments and replies
require_once('comments/list_comments.php');
include './view/header.php'; ?> // show header
}

<?php
    if (isset($password_message)) {  //correct password message
        echo $password_message;
    }
?>