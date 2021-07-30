<?php
session_start();
var_dump($_SESSION);
if (!empty ($_SESSION['user'])){
    session_destroy();

    header('Location:index.php');

}else{
    header("Location: " . $_SERVER['HTTP_REFERER']);

}
?>
