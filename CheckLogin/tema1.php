<?php
session_start();
if ($_SESSION['loggedin'] == FALSE){

    header("Location: ../LoggedIn/temaLoggedIn.php");
}
else{
    header("Location: ../Index/temak.html");
}