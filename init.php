<?php
define('APP_PATH', getcwd());
require_once APP_PATH . '/includes/db_connection.php';
require_once APP_PATH . '/includes/session.php';
require_once APP_PATH . '/models/User.php';

date_default_timezone_set('Europe/Istanbul');

