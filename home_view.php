<?php 

include('view/header.php');
require('model/database.php'); 

// session start
//if (!isset($_SESSION)) {
  //  session_start();

// required files 
include('./view/header.php');
//require_once('util/secure_conn.php');

$comments = $comment = '';

?>

<!--left sign of home_view.php -->
<section class="blog">
<div class="w3-container w3-twothird w3-gray">
    
        <h2>Terrys Travel Blog</h2>
        <!-- start slipsum code -->

<!-- start slipsum code -->
        <p>Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We're on the same curve, just on opposite ends. </p>
        <p>My money's in that office, right? If she start giving me some crap about it ain't there, and we got to go someplace else and get it, I'm gonna leave you there. You understand? </p><p>My money's in that office, right? If she start giving me some crap about it ain't there, and we got to go someplace else and get it, I'm gonna leave you there. You understand? </p><!-- end slipsum code -->In order to add a comment or reply you must login now.</p>
    </div>
</section>

<!-- USER LOGIN TOP RIGHT SIDE OF PAGE  -->

<!-- verify current user -->
<?php if (!isset($_SESSION['currentUser'])) : ?> 

<!--insert here for login form on right side-->
<section>
<div class="w3-container w3-third">
      <h2>User Login</h2>

        <!-- show valid user message here -->
      <!--p id="validUser"><!-?php echo $_SESSION['validUser']; ?></p-->

    <form action="users/login.php" method="post" id="loginform">
        Username: <input type="text" name="username" class="input" id="username">
        <br><br>
        Password: &nbsp<input type="password" name="password" class="input" id="password">
        <br><br>
 
      <!--login button-->
        <input type="submit" value="Login" class="w3-btn w3-round-xxlarge w3-teal w3-right">Login</button> 
      </form><br>
      <hr>

      <?php else : ?> 

      <!--successful login message and echo User name after successfully logging in-->-->
      <?php echo 'Hello ' . $_SESSION['userid']; ?> <!-- CHECK THIS id as user OR userid -->
</div>
    
    <!--Logged in user add comment or reply links-->
        <a href="./comments_manager/add_comment.php">Add Comment</a>
        <a href="./replies_manager/add_replies.php">Add Replies</a><br><br>

    <!--User logout button-->
    <form action="index.php" method="post" id="logout">
         <input type="hidden" name="action" value="logout">
         <input type="submit" value="Logout" class="w3-btn w3-round-xxlarge w3-teal w3-right">
    </form>
    <?php endif; ?>

<!--end of user login and password section-->
</section>


<!--BELOW is to list comments and replies on the bottom of home_view.php-->
<section>
<div class="w3-container" id="bottom">  <!-- id name for CSS -->
      <h2>Comments and Replies Bottom</h2>
    
      <!--check for user logged in -->
      <?php if (!isset($_SESSION['userid'])) : ?>
      <p>Must be logged in to comment or reply</p>
        <?php endif; ?>
        
<!--COMMENTS foreach loop-->
    <!--?php foreach ($comments as $comment) : ?-->

    <!-- show terry_avatar.png for user avatar -->
    <!--img src="images/<!-?php echo $comment['userid'];?>terry_avatar.png" alt="user avatar" class="img_avatar"-->

    <!-- show user name, comment date -->
    <p class="user header"><!--?php echo $comment['userid'];?> commented:</p>
    <p class="userResponseNow">

        <?php
        $userDateTime = new
        DateTime($comment['userDateTime']);
        $userDateTime = $userDateTimeFormatted->format("M j Y h:i A");
        ?>

        <?php echo $userDateTime; ?>

        <input type="submit" class="w3-btn w3-round-xxlarge w3-teal w3-right" value="Delete">
    <!-?php endforeach; ?-->
    </div>

    <!--BELOW is to list replies on the bottom of home_view.php-->
    <?php 
    $comment_id = $comment['comment_id']; /* get comments by comment_id */
    $userReply = getUserReply($comment_id); /* get user reply by comment_id */
    $countReplies = $replies[0]; 
    $replies = $reply[1]; /* reply array from replies index.php */

    if ($countReplies !=0) : ?>
    <?php foreach ($replies as $reply) :?>

    <!-- show user avatar -->
    <img src="images/<?php echo $reply['userid'];?>terry_avatar.png" alt="user avatar" class="img_avatar">?>

    <!-- show user name -->
    <p class="user header"><?php echo $reply['userid'];?> replied:</p>
    <p class="userResponseNow">

        <!--user date and time of user reply-->
    <?php 
        $userDateTime = new
        DateTime($comment['userDateTime']);
        $userDateTime = $userDateTimeFormatted->format("M j Y h:i A");
        echo $userDateTime;

        if (isset($_SESSION['user']) && $_SESSION['user'] == $reply['userid']) : ?>

    <!--allows user to reply to above reply -->
    <form action="index.php" method="post" class="w3-btn w3-round-xxlarge w3-teal w3-right" id="showAddReply"> <!--MAKE SURE FILE NAME IS CORRECT for add reply form -->
    <input type="hidden" name="action" value="showAddReply">
    <input type="submit" class="w3-btn w3-round-xxlarge w3-teal w3-right" value="Reply">
    </form>

    <!--shows add reply form-->
    <?php if ($showAddReply == TRUE) : ?>
    <?php include 'replies_manager/add_replies.php'; ?>
    <?php endif; ?>







<!--WORKS AND PULLS USER COMMENT FROM DATABASE-->
<!----- ALSO NEED TO ADD EDIT AND DELETE FUNCTIONS FOR USER COMMENTS ------->
        <!--tr>
            <td><span class="w3-tag w3-teal"><!-?php echo $comment['userid']; ?></span></td>
            <td><!-?php echo $comment['dateTime']; ?></td><br>
            <td><!-?php echo $comment['comment']; ?></td>

        </tr>
        <br> <!- break -->
        <hr> <!-- line between comments -->
  
<!--/div-->

<!-- DOES NOT WORK -- REPLIES RETRIEVED FROM DATABASE -->
<!----- ALSO NEED TO ADD EDIT AND DELETE FUNCTIONS FOR USER REPLIES ------->
    <!--div class="replies"-->
        <!--php foreach ($replies as $reply) : ?>
            <tr>
                <td><span class="w3-tag w3-purple"><!-?php echo $reply['reply_id']; ?></span></td>
                <td><!-?php echo $reply['dateTime']; ?></td><br>
                <td><!-?php echo $reply['reply']; ?></td>
            </tr>
            <br> < break -->
            <hr> <!-- line between replies --> 
        <!--?php endforeach; ?>
    </div>
    <!-?php endforeach; ?-->      
<!--/section>


<?php endif; ?>
<?php endforeach; ?>
<?php endelseif; ?>

<?php include '/css/style.css'; ?>
<?php include './view/footer.php'; ?>

<?php endif; ?>