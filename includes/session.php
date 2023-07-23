<?php
require APP_PATH . '/models/User.php';
session_start();


function create_session(\TweetApp\User $user)
{
    $_SESSION['user'] = $user;
}


function destroy_session()
{
    session_destroy();
}
