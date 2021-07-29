<?php
include 'include/top.php';
include 'include/db.php';
$results = select10Tweets();
include 'listeTweets.php';
include 'include/bottom.php';
?>
