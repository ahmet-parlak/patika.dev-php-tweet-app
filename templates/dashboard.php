<?php if (isset($_SESSION['user'])) { ?>
    <div class="dashboard">
        <form id="tweet-form" action="tweet.php" method="POST">
            <div class="form-body"><textarea name="tweet" rows="3" cols="50" minlength="1" maxlength="180" placeholder="What's happening?"></textarea></div>
            <div class="form-footer">
                <div class="chars"></div>
                <input class="d-block button tweetle" type="submit" value="Tweet">
            </div>
        </form>
    </div>
<?php } else { ?>
    <div class="dashboard">
        <form id="tweet-form" action="" method="POST">
            <div class="form-body"><textarea name="tweet" rows="3" cols="50" minlength="1" maxlength="180" placeholder="What's happening?" disabled></textarea></div>
            <div class="form-footer">
                <div class="chars">login to tweet</div>
                <input class="d-block button tweetle" type="submit" value="Tweet" disabled>
            </div>
        </form>
    </div>
<?php } ?>
