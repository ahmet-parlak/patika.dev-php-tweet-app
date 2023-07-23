<?php
require_once 'init.php';
if (!isset($_SESSION['user'])) header("Location: index.php");

if (isset($_POST['tweet'])) {
    
    $tweet = htmlspecialchars(trim($_POST['tweet']));
    $tweetLength = strlen($tweet);
    if ($tweetLength > 0 && $tweetLength <= 180) {
        
        try {
            print("test4");
            $q = $db->prepare("INSERT INTO tweets (user_id, content) VALUES (:user_id, :content)");
            $q->execute(['user_id' => $_SESSION['user']->getUserId(), 'content' => $tweet]);
            if ($q->rowCount() > 0) {
                
                header("Location: index.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } catch (PDOException $e) {
            print("An error occured: $e");
        }
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
