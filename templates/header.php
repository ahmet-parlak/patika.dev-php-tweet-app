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
            <?php if ($user != null) {
                echo '<li>' . $user->getUsername() . '</li>';
                echo '<li><a href="logout.php">logout</a></li>';
            } else {
                echo '<li><a href="login.php">login</a></li>
                    <li><a href="register.php">register</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>