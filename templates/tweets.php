<?php
require 'vendor/autoload.php';

use Carbon\Carbon;


try {
    $q = $db->prepare("SELECT t.content, t.created_at, u.username, u.profile_picture_url  FROM tweets t JOIN users u ON u.id = t.user_id ORDER BY t.created_at DESC");
    $q->execute();
    $tweets = $q->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    print("An error occurred: $e");
}
?>

<div class="tweets">
    <?php foreach ($tweets as $tweet) { ?>
        <div class="tweet">
            <div class="user-pp"><img src="public/profile-photos/default.png" alt=""></div>
            <div class="content">
                <div class="tweet-header">
                    <div class="user-name"><?= "@" . $tweet['username'] ?></div>
                    <div class="tweet-date" title="<?= date('d.m.Y h.m', strtotime($tweet['created_at'])) ?>">
                        <?= Carbon::create($tweet['created_at'])->diffForHumans(Carbon::now()) ?>
                    </div>
                </div>

                <div class="tweet-content">
                    <?= $tweet['content'] ?>
                </div>
            </div>

        </div>
    <?php } ?>
    <?php if (count($tweets) == 0) echo "There are no tweets yet. You be the first to tweet!" ?>

</div>