<?php
require_once 'init.php';

$user = null;

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TweetApp</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>

    <?php require_once 'templates/header.php' ?>

    <main>
        <h1>TweetApp</h1>
        <?php require 'templates/dashboard.php' ?>
        <?php require 'templates/tweets.php' ?>
    </main>

    <footer>
    </footer>



    <!-- JS -->
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>