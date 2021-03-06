<?php

include 'include/session.php';
include 'include/db.php';
//initialisation du tableau d'erreurs
$errors = [];
//si pas connecter, redirection vers l'inscription

    if (!empty($_POST)) {
        $pseudo = strip_tags($_POST['username']);
        $password = $_POST['password'];
        //si pas de pseudo
        if (empty($pseudo)) {
            $errors['username'] = 'Veuillez saisir un pseudo SVP !';
        }
        //si pas de password
        if (empty($password)) {
            $errors['password'] = 'Veuillez saisir un password SVP !';
        }
        $resultPseudo = getUserByPseudo($pseudo);
        if (empty($resultPseudo)) {
            $errors['username'] = "Ce pseudo n'est pas enregistrĂ©, veuillez en soumettre un autre, SVP !";
        } else {
            if (!password_verify($password, $resultPseudo['password'])) {
                $errors['password'] = 'Le password est incorrect !';
            }
        }
        if (empty($errors)) {
            //mettre en session
            $_SESSION['user'] = $resultPseudo;
            $_SESSION['flash'] = ['Bienvenue ' . $pseudo . ' !', 'success'];
            //redirection
            header('Location:index.php');
            die();

        }
    }

include 'include/top.php';
?>
<main>
    <div class="container ">
        <h2 class="title is-4">Connexion</h2>
        <div>
            <form method="post" novalidate>

                <div class="field">
                    <label for="username">Pseudo</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input <?= !empty($errors['username']) ? "is-danger" : "" ?>" type="text"
                               id="username"
                               placeholder="toto" value="<?= $pseudo ?? '' ?>" name="username" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <?php if (!empty($errors['username'])): ?>
                        <p class="help is-danger"><?= $errors['username'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input <?= !empty($errors['password']) ? "is-danger" : "" ?>" type="password"
                               id="email" name="password" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-key"></i>
                        </span>
                    </div>
                    <?php if (!empty($errors['password'])): ?>
                        <p class="help is-danger"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-info is-light">Connexion</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>
<?php
include 'include/bottom.php';
?>