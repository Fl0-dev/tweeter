<?php
include 'include/session.php';
if(empty ($_SESSION['user'])){
    header('Location:inscription.php');
    die();
}else {

    include 'include/db.php';

//initialisation du tableau d'erreurs
    $errors = [];
//si passage forcé en get (par l'url)
    if (!empty($_GET)) {
        header("HTTP/1.1 404 Not Found");
        include '404.php';
        die();
    }
    if (!empty($_POST)) {
//récupération des données
        $tweet = strip_tags($_POST['tweet']);//strip_tags enlève les balises html
        var_dump($tweet);
        //validation des données
        //si pas de tweet
        if (empty($tweet)) {
            $errors['tweet'] = 'Veuillez saisir un tweet SVP !';
        } //255 caractères
        elseif (mb_strlen($tweet) > 255) {
            $errors['tweet'] = 'Pas plus de 255 caractères SVP !';
        }
        if (empty($errors)) {
            //todo : envoie en BD
            insertTweet($tweet,$_SESSION['user']['id']);
///////////////////////////////////////////////test//////////////////////
            /* $results =selectAllTweets();
             var_dump($results);
             foreach ($results as $result){
                 echo $result['message'].'<br>';
             }*/

            /*$results=selectTweetById(1);
            var_dump($results);
            echo $results['message'];*/
            //todo : message flash
            //redirection
            header('Location:index.php');
            die();
        }
    }
    include 'include/top.php';
}
?>

<main>
    <div class="container">
        <form method="post" novalidate>
            <div class="field">
                <label for="tweet_input" class="label">Votre message</label>
                <div class="control">
<textarea name="tweet" id="tweet_input" class="textarea <?= !empty($errors['tweet']) ? "is-danger" : "" ?>" placeholder="Que la vie est belle
aujourd'hui !"></textarea>
                </div>
                <?php if (!empty($errors['tweet'])): ?>
                    <p class="help is-danger"><?= $errors['tweet'] ?></p>
                <?php endif; ?>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-link  is-light">Envoyer !</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php
include 'include/bottom.php';
?>
