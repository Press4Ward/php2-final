<?php 
    session_start();

    /* must make sure is logged in first in order to comment */
    //$user_check = $_SESSION["userid"]; 
    //$password = $_SESSION["password"];

    /* must make sure is logged in first in order to comment */

    $user_check = $_SESSION['userid'];
   
    $ses_sql = mysqli_query($db,"select userid from users_db where userid = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $login_session = $row['userid'];

    if(!isset($_SESSION['userid'])){
    header("list_comments.php");
}
?>
<!--include page header-->
<?php include '../view/header.php'; ?>


<link rel="stylesheet" type="text/css" href="../css/style.css">

<div class="w3-container">
    <div class="w3-panel w3-card w3-pale-yellow w3-border w3-round-xxlarge hero-text">
<!-- Start of Add Comment form -->

    <h2>Add Comment</h2>
    <form method="POST">
    <!--form action="list_comments.php" method="post"-->
         <input placeholder='Comment' for="comment" type="text" name='comment' required>&nbsp;
        <?php foreach ($comments as $comment): ?>
            <option value='<?php echo $comment['comment_id']; ?>'><?php echo $comment['user_id']; ?></option>
        <?php endforeach; ?>
        
    </select>

        <!-- add comment submit button -->
        <!--p class="last_paragraph">
        <form action="list_comments.php" method="post">
        <input type="submit" value="Add Comment & Return">
        </form-->

    <p class="last_paragraph">
        <form action="list_comments.php" method="post">
        <a href="../comments/list_comments.php">Add Comment & <br> Return</a>
        </p>
       
       
    <br>
    <br>
    </div>
    </form>

    </div>
    <br>





        

        <!--submit button for comments-->
        <!--form action="list_comments.php" method="post">
        <input type="text" name="comment" method="post"> 

        
            
</form>

        <hidden comment_id -->
        <!--input type="hidden" name="comment_id" value='<!-?php echo $comment_id ?>'/>

        

        <!-?php foreach ($userids as $userid): ?>
        <input placeholder='comment' type='text' name='comment'> &nbsp;

        <label>Comment:</label>
        <option value='<!-?php echo $userid['userid']; ?>'>

        <!-?php echo $userid['comment']; ?></option>  <!-show users comment -->

        <!-- end foreach -->
        <!--?php endforeach; ?>
        
    </select>

        <input type="hidden" method="post" name="action" value="dateTime"> <!- date and time of comment entered -->

        <!--input type="hidden" method="post" name="action" value="comment_id"> <!-auto incremented comment_id generated -->

        <!--label>&nbsp;</label>
            <input type="submit" value="submit"-->

        <!--/form-->

 
<?php include '../view/footer.php'; ?>