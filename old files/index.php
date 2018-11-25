<?php
require_once('../util/main.php');
require_once('util/secure_conn.php');

require_once('model/comments_db.php');
require_once('model/users_db.php');
require_once('model/replies_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'user_login';
        if (isset($_SESSION['user'])) {
            $action = 'user_login';
        }
    }
}

// Store user data in session ----- check variable against table
        $_SESSION['user_login'] = get_user($userid);

        switch ($login) { 
            case 'user_login':
            // Clear login data
            $userid = '';
            $password = '';
         include 'login.php'; // create this file!!!
            break;
            case 'login':
            $userid= filter_input(INPUT_POST, '$userid');
            $password = filter_input(INPUT_POST, 'password');
            break;
        }

 
        // Validate user data
        $validate->user('userid', $userid);
        $validate->text('password', $password, true, 6, 30);

        // If validation errors, redisplay Login page and exit controller
        if ($fields->hasErrors()) {
            include 'user/user_login_register.php'; // create this file
        }

        // Check email and password in database
        if (is_valid_user_login($userid, $password)) {
            $_SESSION['user_login'] = get_user_by_id($id);
        } else {
            $password_message = 'Login failed. Invalid email or password.';
            include 'user_manager/user_login_register.php'; // create this file
        }

        // If necessary, redirect to the comment app
        // Redirect to the comment application  ///confirm these files!!!
        if (isset($_SESSION['comment'])) {
            unset($_SESSION['comment']);
            redirect('../comment');
        } else {
            redirect('.');
        }
?>