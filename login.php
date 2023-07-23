<?php
require_once 'init.php';

if (isset($_SESSION['user'])) header("Location: index.php");

if (count($_POST) > 0) {
    $validation_errs = [];
    $oldUsername;
    function validate()
    {
        global $db, $validation_errs, $oldUsername;

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));

            $oldUsername = $username;

            if ($username != null && $password != null) {
                try {
                    /* Find User */
                    $q = $db->prepare("SELECT * FROM users WHERE username=:username");
                    $q->execute(['username' => $username]);
                    $user =  $q->fetch(PDO::FETCH_ASSOC);
                    if ($user && password_verify($password, $user['password'])) {
                        $user = new TweetApp\User($user['id'], $user['username'], $user['profile_picture_url']);

                        /* Create Session */
                        create_session($user);
                        header('Location: index.php');
                        exit();
                    } else {
                        array_push($validation_errs, 'Invalid username or password!');
                    }
                } catch (PDOException $e) {
                    array_push($validation_errs, 'An error occurred: ' . $e->getMessage());
                }
            } else {
                array_push($validation_errs, 'Please enter your username and password!');
            }
        } else {
            array_push($validation_errs, 'Please enter your username and password!');
        }
    }
    validate();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TweetApp</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>

    <header>
        <div class="logo">
            <nav>
                <ul>
                    <li><a href="index.php">home</a></li>
                </ul>
            </nav>
        </div>
        <nav>
            <ul>
                <li><a href="login.php">login</a></li>
                <li><a href="register.php">register</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1 class="underlined">Login TweetApp</h1>
        <form id="login-form" action="" method="post">
            <input class="login-input" type="text" name="username" autocomplete="off" placeholder="@username" required minlength="3" maxlength="50" value="<?php if (isset($oldUsername)) echo $oldUsername ?>">
            <input class="login-input" type="password" name="password" placeholder="password" required>
            <div class="validation-errors">
                <ul>
                    <?php
                    if (!empty($validation_errs)) {
                        foreach ($validation_errs as  $err) {
                            echo "<li>$err</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <input class="button" type="submit" value="Login">
        </form>
    </main>

    <footer>

    </footer>

</body>

</html>