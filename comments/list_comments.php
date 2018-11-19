<?php 
    include('../view/header.php'); ?>

<!--require('../model/database.php'); 
    require('./model/comments_db.php');
    require('./model/users_db.php');
    require('./util/tags.php');
    require('./util/main.php');

//required databases and files

?-->

<section>
<!--left side of list_comments.php page -->
<div class="w3-container">
    <div class="hero-image">
    
    <div class="w3-row w3-border">
         <div class="w3-container w3-twothird w3-gray">
        <h2>Terrys Travel Blog</h2>
        <p>Here's the latest on why you should not wait to the last minute to book last minute airline tickets. Samuel L Jackson BLAH Blah blah.Samuel L Jackson BLAH Blah blah. Samuel L Jackson BLAH Blah blah. Samuel L Jackson BLAH Blah blah. Samuel L Jackson BLAH Blah blah. Samuel L Jackson BLAH Blah blah. Samuel L Jackson BLAH Blah blah. Samuel L Jackson BLAH Blah blah. Samuel L Jackson BLAH Blah blah.  <br><br>In order to add a comment or reply you must login now.</a></p>

        <!--button type="submit" class="w3-btn w3-round-xxlarge w3-teal w3-right">Add Comment</button-->
            <a href="add_comment.php" class="w3-btn w3-round-xxlarge w3-teal">Add Comment</a>&nbsp

        <a href="../replies_manager/add_replies.php" class="w3-btn w3-round-xxlarge w3-teal">Add Replies</a><br><br>


</div>
<!--/section-->

<!--insert here for login form on right side-->
<!--insert here for login form on right side-->
<section>
<div class="w3-container w3-third">
      <h2>User Login</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Username: <input type="text" name="username" class="username">
        <br><br>
        Password: &nbsp<input type="password" name="password" >
        <br><br>
 
      <!--login button-->
        <button type="submit" class="w3-btn w3-round-xxlarge w3-teal w3-right">Login</button> 
      </form><br>
      <hr>

<!--Echo User name after successfully logging in-->
   <div>
      <?php echo "Hi . $session", isset($session); ?><br>

      <div class="imgcontainer">
        <img src="../images/terry_avatar.png" alt="Avatar" class="avatar" width="50" height="50">
      </div>

      <?php echo "Hello ", isset($userid) ? $userid : "$userid" ?><br>
    
    <!--logout button-->

      <a href="/user_manager/logout.php" class="w3-btn w3-round-xxlarge w3-teal w3-right">Logout</a><br><br>
  
      </div>

<!--end of user login and password section-->
</section>
</div>
        

<!--below is to list comments and replies on the bottom of comments_manager/list_comments.php -->
<section>
<div class="w3-container" id="bottom">  <!-- id name for CSS -->
      <h2>Comments and Replies Bottom</h2>
        
<!--main-->

<!--comments foreach loop-->
    <?php foreach ($comments as $comment) : ?>

<!--WORKS AND PULLS USER COMMENT FROM DATABASE-->
<!----- ALSO NEED TO ADD EDIT AND DELETE FUNCTIONS FOR USER COMMENTS ------->
        <tr>
            <td><span class="w3-tag w3-teal"><?php echo $comment['userid']; ?></span></td>
            <td><?php echo $comment['dateTime']; ?></td><br>
            <td><?php echo $comment['comment']; ?></td>

        </tr>
        <br> <!-- break -->
        <hr> <!-- line between comments -->
  
</div>

<!-- DOES NOT WORK -- REPLIES RETRIEVED FROM DATABASE -->
<!----- ALSO NEED TO ADD EDIT AND DELETE FUNCTIONS FOR USER REPLIES ------->
    <div class="replies">
        <?php foreach ($replies as $reply) : ?>
            <tr>
                <td><span class="w3-tag w3-purple"><?php echo $reply['reply_id']; ?></span></td>
                <td><?php echo $reply['dateTime']; ?></td><br>
                <td><?php echo $reply['reply']; ?></td>
            </tr>
            <br> <!-- break -->
            <hr> <!-- line between replies --> 
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>      

</section>
</main>

<?php include 'view/footer.php'; ?>