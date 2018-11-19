<?php
    // start session
   session_start();
   
   if(session_destroy()) {
      header('location:../comments_manager/list_comments.php');
   }
?>