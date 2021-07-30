<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<header class="section">
    <div class="container">
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                <img src="img/logo.png">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu has-text-centered">
            <div class="navbar-start">
                <a class="navbar-item" href="index.php">
                    <span class="icon mr-1"><i class="fas fa-home"></i></span>
                    Home
                </a>

                <a class="navbar-item" href="newTweet.php">
                    <span class="icon mr-1"><i class="fas fa-pen-alt"></i></span>
                    Tweeter !
                </a>
            </div>

            <div class="navbar-end">
                <?php
                if(empty($_SESSION['user'])) : ?>
                        <a class="navbar-item button is-info is-light" href="inscription.php">
                            <span class="icon mr-1"><i class="fas fa-book"></i></span>
                            <strong>Inscription</strong>
                        </a>
                <?php endif;?>
                <?php
                if(empty($_SESSION['user'])) : ?>
                        <a class="button is-success is-light" href="logIn.php">
                            <span class="icon mr-1"><i class="fas fa-user"></i></span>
                            <strong>Connexion</strong>
                        </a>
                <?php endif;?>
                <?php
                if(!empty($_SESSION['user'])) : ?>

                <a class="button is-danger is-light" href="logOut.php">
                    <span class="icon mr-1"><i class="fas fa-times-circle"></i></i></span>
                    <strong>Déconnexion (<?=$_SESSION['user']['pseudo']?>)</strong>
                </a>
                <?php endif;?>
            </div>
        </div>
    </nav>
    </div>
</header>

<?php
//récupération des messages flash si contenue dans la session
if(!empty($_SESSION['flash'])) : ?>
    <div class="container content">
        <div class="notification is-<?=$_SESSION['flash'][1]?>> has-text-centered">
            <?=$_SESSION['flash'][0]?>
        </div>
        <?php unset($_SESSION['flash'])?>

    </div>
<?php endif;?>
