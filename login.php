<?php 
    require_once('parts/header.php');
    //require_once('private/login.inc.php');
?>

    <main>
        <h1>Login</h1>
        <form class="form" action="private/login.inc.php" method="post">
            <p class="white">Name:</p><input type="text" name="username_uid" placeholder="Username">
            <p class="white">Password:</p><input type="password" name="password_uid" placeholder="Password">
            <button type="submit" name="login_submit">Login</button>
        </form>
        <a href="register.php">I don't have an account</a>
    </main>

<?php 
    require_once('parts/footer.php');
?>
