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

                        <a class="navbar-item button is-info is-light" href="inscription.php">
                            <span class="icon mr-1"><i class="fas fa-heart"></i></span>
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-successis-light" href="#">
                            <span class="icon mr-1"><i class="fas fa-user"></i></span>
                            Log in
                        </a>
            </div>
        </div>
    </nav>
    </div>
</header>
