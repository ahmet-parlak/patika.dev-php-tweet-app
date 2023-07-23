<?php
try {
    $host = 'localhost';
    $dbname = 'patika.dev_tweet_app';
    $db_username = 'root';
    $db_password = '';

    $db = new PDO("mysql:host=$host;dbname=$dbname", "$db_username", "$db_password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->query('SET @@lc_time_names = "tr_TR";');
} catch (PDOException $e) {
    print $e->getMessage();
}

