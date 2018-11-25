<!--?php include '../view/header.php'; ?-->
<main>
    <h1>Comments Test</h1>

    <section>

        <!-- display a table of rooms -->
        <div class="w3-container">

            <table class="w3-table-all" style="width:100%">
                <tr>
                    <th>User</th>
                    <th>Post Date</th>
                    <th>Comment</th>
                    <th>&nbsp;</th>
                </tr>

                <!--?php foreach ($comments as $comment) : ?-->
                <tr>
                    <td><?php echo $comment['userid']; ?></td>
                    <td><?php echo $comment['dateTime']; ?></td>
                    <td><?php echo $comment['comment']; ?></td>
                    <td><form action="index.php" method="post">

                      <input type="hidden" name="userid" value="<?php echo $comment['userid']; ?>">
                      <input type="hidden" name="action" value="delete_comment">
                      <input type="submit" value="Delete">
                    </form></td>

                </tr>
                <!--?php endforeach; ?-->
            </table>
    </div>
        <!--p><a href="add_comment.php">Add Comment</a></p-->
        <p><a href="../comments/add_comment.php">Add Comment</a></p>

    </section>
</main>
<?php include '../view/footer.php'; ?>
