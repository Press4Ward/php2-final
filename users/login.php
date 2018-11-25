<?php 

// retrieve required databases
include('../model/database.php');
require_once('../model/users.php');

//start session
session_start();
    
// global database variable
//global $db;
global $dsn;

// if userid and password sent from form
if($_SERVER["REQUEST_METHOD"]=="POST"){ 
    //$userid = filter_input(INPUT_POST, 'userid');
   //$password = filter_input(INPUT_POST, 'password');

   // changed $db to $dsn because it was pulling database password not user password from users table
   $currentUser = mysqli_real_escape_string($dsn,$_POST['userid']); 
   $currentPassword = mysqli_real_escape_string($dsn,$_POST['password']);

    $sql = "SELECT userid FROM users WHERE userid = '$currentUser' and password = '$currentPassword'";
    $result = mysqli_query($dsn, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    // if result match $userid and $password, table row must be 1 row

    if($count == 1) {
        $session_register("currentUser");
        $_SESSION['login_user'] = $currentUser;

        header("Location:.home_view.php");
    } else {
        $error = "Your userid or password is not correct, please try again.";
    }
}
?>

<div class="w3-container w3-half">
    <div class="w3-container">
        <h2>User Login TEST</h2>

        <form action="" method="post">
            <label>Name: </label><input type="text" name="userid" class="input">
            <br><br>
            <label>Password: </label><input type="password" name="password" class="input" >
            <br><br>
            
            <input type="submit" name="submit" value="Submit">
    </div>
</div>
<?php
    echo "<h3>Hello $currentUser </h3>";
    echo $currentUser;
    echo "<br>";
    echo $currentPassword;
    echo "<br>";

    echo $login_message; 
?>
</form>


   
   
    </main>
</body>
</html>


