<?php

include 'include/session.php';
include 'include/db.php';
include 'include/top.php';
$results = select10Tweets();
include 'include/listeTweets.php';
include 'include/bottom.php';
?>
