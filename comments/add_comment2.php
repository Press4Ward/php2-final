<main>
    <h1>Add New Comment</h1>
    <form action="index2.php" method="post" id="add_comment">
        <input type="hidden" name="action" value="add_comment">

        <label>User Name:</label>
        <input type="text" name="userid"  />
        <br>

         <!--label>Post Date:</label-->
        <input type="hidden" name="action" name="dateTime"  />
        <br>

        <label>Comment:</label>
        <input type="text" name="comment"  />
        <br>

        <label>&nbsp;</label>
        <input type="submit" name="add_comment" value="Add Comment" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index2.php">View Comments</a>

</main>
<?php include '../view/footer.php'; ?>