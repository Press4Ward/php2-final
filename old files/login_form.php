<?php
    //require_once('util/secure_conn.php'); // require secure connection
    require('view/header.php'); // show header
?>

<<?php
// define variables and set to empty values
$userid = $password = $comment = $reply = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userid = test_input($_POST["userid"]);
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
?>

<div class="w3-container w3-half">
<div class="w3-container">
<h2>User Login TEST</h2>

<h2>User Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="userid" >
  <br><br>
  password: <input type="password" name="password" >
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Reply: <textarea name="reply" rows="5" cols="40"></textarea>
  <br><br>

  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h3>Hello $userid </h3>";
echo $userid;
echo "<br>";
echo $password;
echo "<br>";
echo $comment;
echo "<br>";
echo $reply;
//echo $login_message; ?>
    </main>
</body>
</html>