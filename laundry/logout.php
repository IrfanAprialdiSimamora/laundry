<?php

     session_start();
     $_SESSION["login_user"];

     unset($_SESSION["login_user"]);

     session_unset();
     session_destroy();

     header("location:index.php");
	
?>