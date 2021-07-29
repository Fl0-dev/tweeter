<?php
include 'include/db.php';

//recupération du paramètre du get
$tweet_id = $_GET['tweet_id'];
addLike($tweet_id);
header('Location:index.php');
die();