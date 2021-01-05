<?php
include "parts/header.php";
require_once('php/function/user.inc.php');
require_once('php/function/account-save.inc.php');
require_once('php/function/account-read.inc.php');

?>

<main>
    <h1>Account</h1>
    <form class="form" action="php/function/account-save.inc.php" method="post">
        <p>Email:</p><input type="text" name="email_uid" placeholder="<?= $result[0][1]; ?>">
        <p>Password:</p><input type="password" name="password_uid" placeholder="New password">
        <p>Confirm password:</p><input type="password" name="password_confirm" placeholder="New password confirm">
        <p>First name:</p><input type="text" name="firstname_uid" placeholder="<?= $result[0][3]; ?>">
        <p>Last name:</p><input type="text" name="lastname_uid" placeholder="<?= $result[0][4]; ?>">
        <button type="submit" name="save_submit">Update</button>
    </form>
</main>


<?php
include "parts/footer.php";
?>