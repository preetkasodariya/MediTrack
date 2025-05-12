<?php

session_start();

unset($_SESSION["islogin"]);

header("Location:index.php");


?>