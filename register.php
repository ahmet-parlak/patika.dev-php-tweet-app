<?php
require_once 'init.php';

if (isset($_SESSION['user'])) header("Location: index.php");

if (count($_POST) > 0) {
    $validation_errs = [];
    $oldUsername;
    function validate()
    {
        global $db, $validation_errs, $oldUsername;

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_control'])) {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));
            $passwordControl = htmlspecialchars(trim($_POST['password_control']));

            $oldUsername = $username;

            if ($username != null && $password != null && $passwordControl != null) {
                
                if(strlen($username)<3 && strlen($username)>50){
                    array_push($validation_errs, 'Username must be at least 3 character');
                    return;
                }

                if(strlen($password)<6){
                    array_push($validation_errs, 'Password must be at least 6 character');
                    return;
                }

                if ($password != $passwordControl) {
                    array_push($validation_errs, 'Passwords do not match!');
                    return;
                }

                try {
                    $q = $db->prepare("SELECT username FROM users WHERE username=:username");
                    $q->execute(['username' => $username]);
                    if ($q->rowCount() > 0) {
                        array_push($validation_errs, 'This username is already taken');
                        return;
                    }

                    /* Password Hash */
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    /* Insert User */
                    $q = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
                    $q->execute(['username' => $username, 'password' => $hashed_password]);
                    if ($q->rowCount() > 0) {
                        $user = new TweetApp\User($db->lastInsertId(), $username);

                        /* Create Session */
                        create_session($user);
                        header('Location: index.php');
                        exit();
                    } else {
                        array_push($validation_errs, 'An error has occurred');
                    }
                } catch (PDOException $e) {
                    array_push($validation_errs, 'An error occurred: ' . $e->getMessage());
                }
            } else {
                array_push($validation_errs, 'Please fill in all fields!');
            }
        } else {
            array_push($validation_errs, 'Please fill in all fields!');
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
    <title>Register | TweetApp</title>

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
        <h1 class="underlined">Register TweetApp</h1>
        <form id="register-form" action="" method="post">
            <input class="register-input" type="text" name="username" autocomplete="off" placeholder="@username" required minlength="3" maxlength="50" value="<?php if (isset($oldUsername)) echo $oldUsername; ?>">
            <input class="register-input" type="password" name="password" placeholder="password" required minlength="6">
            <input class="register-input" type="password" name="password_control" placeholder="password control" required>
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
            <input class="button" type="submit" value="Register">
        </form>
    </main>

    <footer>

    </footer>

</body>

</html>