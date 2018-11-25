<!-- verify the session and if there is no session direct user to the login page-->

<?php
   include('database.php');
   session_start();
   
   $user_check = $_SESSION['userid'];
   
   $ses_sql = mysqli_query($dsn,"select userid from users where userid = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['userid'];
   
   if(!isset($_SESSION['userid'])){
      header("Location:.login.php");
   }
?>