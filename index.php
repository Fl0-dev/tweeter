<?php
//ouverture de session
session_start();
include 'include/top.php';
include 'include/db.php';
$results = select10Tweets();
include 'include/listeTweets.php';
include 'include/bottom.php';
?>
