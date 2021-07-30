<?php
include 'include/session.php';
include 'include/db.php';
//initialisation du tableau d'erreurs
$errors = [];
//si passage forcé en get (par l'url)
if (!empty($_GET)) {
    header("HTTP/1.1 404 Not Found");
    include '404.php';
    die();
}
//le formulaire est-il soumis
//var_dump($_POST);
//arrêt de la méthode POST
//die();
if (!empty($_POST)) {
    //récupération des données
    $email = strip_tags($_POST['email']);//strip_tags enlève les balises html
    $pseudo = strip_tags($_POST['username']);
    $password = $_POST['password'];
    $biographie = strip_tags($_POST['bio']);
    //var_dump($_POST);
//validation des données
    //validation de l'email
    //si pas de mail
    if (empty($email)) {
        $errors['email'] = 'Veuillez saisir un email SVP !';
    } //validation format
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Veuillez saisir un email valide SVP !';
    }
    //vérification si existence en BD
    $resultEmail=getUserByEmail($email);
    if (!empty($resultEmail)){
        $errors['email'] = 'Il existe déjà en DB, donnez une autre adresse SVP';
    }
    //validation du pseudo
    //si pas de pseudo
    if (empty($pseudo)) {
        $errors['username'] = 'Veuillez saisir un pseudo SVP !';
    } //longeur du pseudo
    elseif (mb_strlen($pseudo) < 3) {
        $errors['username'] = 'Veuillez saisir un pseudo de plus de 3 caractères SVP !';
    } elseif (mb_strlen($pseudo) > 30) {
        $errors['username'] = 'Veuillez saisir un pseudo de moins de 30 caractères SVP !';
    }
    //vérification si existence en BD
    $resultPseudo=getUserByPseudo($pseudo);
    if (!empty($resultPseudo)){
        $errors['username'] = 'Il existe déjà en DB, donnez un autre pseudo SVP';
    }
    //validation du password
    //si pas de password
    if (empty($password)) {
        $errors['password'] = 'Veuillez saisir un password SVP !';
    }
    //Minimum 8 caractères, 1 chiffre
    $regex = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
    if (!preg_match($regex, $password)) {
        $errors['password'] = 'Veuillez saisir un password avec 1 chiffre et 8 caractères SVP !';
    }

    //var_dump($errors);
    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT, ['cost=>14']);//hash le password
        //envoie en BD
        insertUser($email,$pseudo,$hash,$biographie);
        //message flash
        $_SESSION['flash']=['Bienvenue '.$pseudo.' !','success'];
        $_SESSION['user'] = getUserByPseudo($pseudo);
        //redirection
        header('Location:index.php');
        die();
    }else{
        //message flash
        $_SESSION['flash']=['Vous avez des erreurs !','danger'];
    }

}
include 'include/top.php';
?>

<main>
    <div class="container ">
        <h2 class="title is-4">Inscription</h2>
        <div>
            <form method="post" novalidate>
                <div class="field">
                    <label for="email">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input <?= !empty($errors['email']) ? "is-danger" : "" ?>" type="email" id="email"
                               placeholder="emai@toto.fr" value="<?= $email ?? '' ?>" name="email" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <?php if (!empty($errors['email'])): ?>

                        <p class="help is-danger"><?= $errors['email'] ?></p>

                    <?php endif; ?>

                </div>
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
                    <label for="bio">Biographie</label>
                    <div class="control has-icons-left has-icons-right">
                        <textarea class="textarea" id="bio" placeholder="Décrivez vous"
                                  name="bio"><?= $bio ?? '' ?></textarea>

                    </div>
                    <?php if (!empty($errors['biographie'])): ?>
                        <p class="help is-danger"><?= $errors['biographie'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-info is-light">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
include 'include/bottom.php';
?>
