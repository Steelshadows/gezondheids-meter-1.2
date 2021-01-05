<?php 
    require_once('parts/header.php');
    require_once('php/function/register.inc.php');
?>

    <main>
        <h1>Register</h1>
        <form class="form" action="php/function/register.inc.php" method="post">
            <p class="white">Email:</p><input type="text" name="email_uid" placeholder="Email">
            <p class="white">Password:</p><input type="password" name="password_uid" placeholder="Password">
            <p class="white">Confirm password:</p><input type="password" name="password_confirm" placeholder="Password Confirm">
            <p class="white">First name:</p><input type="text" name="firstname_uid" placeholder="First name">
            <p class="white">Last name:</p><input type="text" name="lastname_uid" placeholder="Last name">
            <button type="submit" name="register_submit">Register</button>
        </form>
    </main>

<?php 
    require_once('parts/footer.php');
?>
