<?php
//ouverture de session
session_start();

if (empty ($_SESSION['indexViews'])){
    $_SESSION['indexViews']=1;
}else{
    $_SESSION['indexViews']++;
}
?>