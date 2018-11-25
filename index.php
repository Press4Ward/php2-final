<?php
//required databases and files
require('model/database.php');
require('model/comments.php');
require('util/tags.php');
//require('util/main.php');
include('view/header.php');

// get function arrays to show comments and replies
$comment = get_comments();
$reply = get_replies();

?>

<style>
    /* index.php landing page */
.hero-image {
  background-image: url("sharks.jpg");
  /* background-color: #cccccc; */
  height: 700px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  opacity: 0.8; /* image opacity */
  filter: alpha(opacity=80); /* For IE8 and earlier */
}
</style>


<main>
<body>

<div class="w3-container">
    <!--div class="hero-image"-->
        <div class="w3-panel w3-card w3-pale-yellow w3-border w3-round-xxlarge hero-text">
        <h1 style="font-size:50px">Terrys Travel Blog</h1>
             <p>Here's the latest on why you should not wait to the last minute to book last minute airline tickets.</p>

            <!-- comments button -->
            <a href="list_comments.php" class="w3-button w3-round-xxlarge w3-teal">Comments</a>
            
            <!-- login button -->
            <a href="users/login.php" class="w3-button w3-round-xxlarge w3-medium w3-teal" w3-round-xlarge>Login</a>

            <!-- ADD SUCCESSFUL LOGIN IN MESSAGE HERE ???-->
           

        </div>
    </div>
</div>

</body>
</html>
</main>
<br>
<script type="text/php" src="comments/list_comments2.php"></script>
<?php include 'view/footer.php'; ?>