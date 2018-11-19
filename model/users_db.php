<?php
/* function to add user or sign-up from page 703 */
function add_user($userid, $password) {
    global $db;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO users (userid, password) VALUES ( :userid, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(' :userid, $userName');
    $statement->bindValue(' :password, $password');
    $statement->execute();
    $statement->closeCursor();
}

/* function to check if user is valid and can login from page 703 */
function is_valid_user_login($userid, $password) {
    global $db;
    $query = 'SELECT password FROM users WHERE userid = :userid';
    $statement = $db->prepare($query);
    $statement->bindValue(' :userid, $userid');
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    $hash = $row['password'];
    return password_verify($password, $hash);
}
/* retrieve user id from table */
function get_user_info($userid) {
    global $db;
    $query = "SELECT * FROM users WHERE userid = :userid";
    $statement = $db->prepare($query);
    $statement->bindValue(':userid', $userid);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

?>