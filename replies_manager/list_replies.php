<main>
    <h1>Replies</h1>

    <!-- display all replies -->
    <div class="w3-container">
        <table class="w3-table-all" stule="width:100%">
        <tr>
            <th>Replies</th>
            <th>User</th>
            <th>Date & Time</th>
        </tr>

        <?php foreach ($replys as $reply) : ?>
        <tr>
            <td><?php echo $reply['userid']; ?></td>
            <td><?php echo $reply['reply']; ?></td>
            <td><?php echo $reply['dateTime']; ?></td>
            <td><form action="index.php" method="post">

            <input type="hidden" name="reply_id" value="<?php echo $reply['reply_id'];?>">
            <input type="hidden" name="action" value="delete_reply">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <p><a href="add_replies.php">Add Reply</a></p>
    <!--p><a href="../replies_manager/add_replies.php">Add Reply</a></p-->

    </section>
    </main>
    <?php include '../view/footer.php'; ?>