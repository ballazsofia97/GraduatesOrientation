<?php
session_start();
$_SESSION['loggedin'] = TRUE;
session_abort();
header("Location:  ../Index/temak.html");