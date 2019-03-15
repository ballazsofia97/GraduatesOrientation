<?php
session_start();
if ($_SESSION['loggedin'] == FALSE){

    header("Location: ../LoggedIn/feltoltLoggedIn.php");
}
else{
    header("Location: ../Index/feltolt.html");
}