<?php
    $userLoggedIn = isset($_SESSION['user']['id']);
?>

<nav class="navbar">
    <h1>Gezondheidsmeter</h1>
    <div class="navbar-content <?=$userLoggedIn !== true ? 'justify-content-center' : 'justify-content-end'?>">
        <?php if($userLoggedIn) { ?>
            <a class="w33" href="profile.php">ingelogd als: <span><?=$_SESSION['user']['username']?></span></a>
            <a class="nav-link w33" href="dashboard.php">dashboard</a>
            <a class="nav-link w33" href="logout.php">uitloggen</a>
        <?php } else { ?>
            <a href="index.php" class="nav-link">inloggen</a>
            <a href="register.php" class="nav-link">registeren</a>
        <?php }?>
    </div>
</nav>