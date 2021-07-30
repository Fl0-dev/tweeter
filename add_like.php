<?php
include 'include/db.php';
//si mon tableau associatif $_GET est vide, ce n'esp aps normale et je redirige vers une 404
if (empty($_GET)){
    //redirection vers une page 404 (page non trouvée)
    header("HTTP/1.1 404 Not Found");
    include("404.php");
    die();
} elseif (!isset($_GET['tweet_id'])) {
    //redirection vers une page 404 (page non trouvée)
    header("HTTP/1.1 404 Not Found");
    include("404.php");
    die();
} else if (count($_GET)>= 2) {
    //redirection vers une page 404 (page non trouvée)
    header("HTTP/1.1 404 Not Found");
    include("404.php");
    die();
}
//recupération du paramètre du get
$tweet_id = $_GET['tweet_id'];
addLike($tweet_id);
//redirige vers la page d'où l'on vient !!espace!!
header("Location: " . $_SERVER['HTTP_REFERER']);
die();
?>