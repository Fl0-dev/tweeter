<?php
include 'include/session.php';
include 'include/db.php';

//recupération du paramètre du get
$user_id = $_GET['user_id'];
$user = getUserById($user_id);

$results = selectTweetsById($user_id);
include 'include/top.php';
?>

<main class="section">
    <div class="container content">
        <h2>Profil de <?=$user['pseudo']?></h2>
        <p><?=!empty($user['biographie'])?'Biographie :  '.$user['biographie'] : "" ?></p>
    </div>
</main>

<?php
include 'include/listeTweets.php';
include 'include/bottom.php';
?>