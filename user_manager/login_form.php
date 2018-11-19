<?php
    //require('util/secure_conn.php'); // require secure connection
    require('view/header.php'); // show header
?>

<!-- echo message must be logged in to comment or reply -- IS THIS WRITTEN YET??-->
<?php 
    if (isset($message)) {
        echo $message;
    }
?>



<?php
// define variables and set to empty values
$username = $password = $comment = $reply = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["username"]);
  $password = test_input($_POST["password"]);
  $comment = test_input($_POST["comment"]);
  $reply = test_input($_POST["reply"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo password_hash("$password", PASSWORD_DEFAULT);

?>
<div class="w3-container w3-half">
<div class="w3-container">
<h2>User Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="username" value="enter username">
  <br><br>
  password: <input type="password" name="password" value="enter password">
  <br><br>
   
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Reply: <textarea name="reply" rows="5" cols="40"></textarea>
  <br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>
    </div>


<?php
   include('session.php');
?>
<
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>






<?php
echo "<h2>Hello . $username </h2>";
echo $username;
echo "<br>";
//echo $password;
//echo password_hash("$password", PASSWORD_DEFAULT);
//echo "<br>";
echo $comment;
echo "<br>";
echo $reply;
?>
















<!--
<div class="w3-container">
    <form method="post">
        <div class="login">
        <label for="username">Username</label>
            <input type="text" name="username" class="login_form" id="username" placeholder="Enter username"><br>
            </div>

<div class="w3-container">
    <form method="post">
        <div class="login">
        <label for="password">Password</label>
            <input type="password" name="password" class="login_form" id="password" placeholder="Enter password"><br>
            </div>

<button type="submit" class="btn btn-primary">Submit</button>
  </form>
        
<body>
    <main>
        <h2>Login</h2>
        <form action="." method="post" id="login_form" class="aligned">
        
            <input type="hidden" name="action" value="login">

            <label>User Login:</label>
            <input type="text" class="text" name="userid">
            <br>

            <label>Password:</label>
            <input type="password" class="text" name="password">
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Login">

            <!-if successful login use PHP redirect -->
            <!--?php echo "/user_manager/login.php"</script>'; ?-->
            <!--a href="../user_manager/login_form.php">Login Please</a><br><br>
        </form>

        <p><?php echo $login_message; ?></p>
    </main>
</body>
</html>