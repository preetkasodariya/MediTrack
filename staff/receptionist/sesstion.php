<?php 

session_start();

if(!isset($_SESSION["stafflogin"]))
{
    header("Location:index.php");
}

include 'connetion.php';

?>