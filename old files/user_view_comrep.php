<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<main>
    <h1>User</h1>

    <!--echo user logged in -->
    <p><?php echo $userid . ' (' . $userid . ')'; ?></p>


<!--echo user comments -->
    <?php if (count($comments) > 0 ) : ?>
        <h2>Your Comments</h2>
        <ul>
            <?php foreach($comments as $comment) :
                $comment_id = $comment['comment_id'];
                $comment_date = strtotime($comment['dateTime']);
                $comment_date = date('M j, Y', $dateTime);
                $url = $app_path . 'user' .
                       '?action=view_comrep&comment_id=' . $comment_id;
                ?>
                <li>
                    Comment # <a href="<?php echo $url; ?>">
                    <?php echo $comment_id; ?></a> commented on
                    <?php echo $comment_date; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


                    <!--echo user replies -->
                    <?php if (count($replies) > 0 ) : ?>
                        <h2>Your Replies</h2>
                    <ul>
                    <?php foreach($replies as $reply) :
                        $reply_id = $reply['reply_id'];
                        $reply_date = strtotime($reply['dateTime']);
                        $reply_date = date('M j, Y', $dateTime);
                        $url = $app_path . 'user' .
                           '?action=view_comrep&reply_id=' . $reply_id; // redirect to same page as comments - ideally have comments and replies on same page
                    ?>
                        <li>
                        Reply <a href="<?php echo $url; ?>">
                        <?php echo $reply_id; ?></a> replied on
                        <?php echo $reply_date; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                     <?php endif; ?>
