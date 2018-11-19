<?php
    // start session
   session_start();
   
   if(session_destroy()) {
      header('location:list_comments.php');
   }
?>