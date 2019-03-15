<?php
session_start();
if ($_SESSION['loggedin'] == TRUE){

    header("Location: ../LoggedIn/tanarLoggedIn.php");
}
else{
    header("Location: ../Index/tanarok.html");
}