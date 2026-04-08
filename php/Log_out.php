<?php
//this script logout the user
session_start();

            unset($_SESSION['userName']);
            unset($_SESSION['loggedIN']);
            unset($_SESSION['USER_ID']);
            
             session_destroy();
             
             header("location: /Tez_website/Main.php");
            exit;


?>