<?php include '../view/header.php'; ?>

<!-- Start of Add Reply form -->
<!--?php include '../view/header.php'; ?> <!-include page header-->
<!--?php include '../view/header.php'; ?> <!-include page header-->
<link rel="stylesheet" type="text/css" href="../css/style.css">

<div class="w3-container">
    <div class="w3-panel w3-card w3-pale-yellow w3-border w3-round-xxlarge hero-text">


<!-- start of add reply form -->
<main>
    <h3>Add Reply</h3>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_replies" />

        <!--submit button for reply-->
        <input type="text" name="reply"> 
        <input type="submit"  formaction="../comments/list_comments.php" value="Add Reply" />

        <!-- hidden reply_id -->
        <input type="hidden" name="reply_id" value='<?php echo $reply_id ?>'/>

        <!-- hidden userid -->
        <input type="hidden" name="userid" value='<?php echo $userid ?>'/>

        <?php foreach ($userids as $userid): ?>
        <input placeholder='reply' type='text' name='reply'> &nbsp;

        <label>Reply:</label>
        <option value='<?php echo $userid['userid']; ?>'>

        <?php echo $userid['reply']; ?></option>  <!--show users comment -->

        <!-- end foreach -->
        <?php endforeach; ?>
        
    </select>


        <input type="hidden" method="post" name="action" value="dateTime"> <!-- date and time of reply entered -->

        <input type="hidden" method="post" name="action" value="reply_id"> <!-- auto incremented reply_id generated -->

        <!--label>&nbsp;</label>
            <input type="submit" value="submit"-->



        </form>

        <p class="last_paragraph">
        <a href="../comments/list_comments.php">Add Reply & Return</a>
        </div>

 </main>
 </div>
<?php include '../view/footer.php'; ?>