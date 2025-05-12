<?php 

session_start();

if(!isset($_SESSION["islogin"]))
{
    header("Location:index.php");
}

include 'connetion.php';

?>