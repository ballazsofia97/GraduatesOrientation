<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "szakdolgozat";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$newpassw = $_POST['passw'];

$newHpassw = password_hash($newpassw, PASSWORD_DEFAULT);

echo $newHpassw;


$sql = "UPDATE diakok SET Password = '$newHpassw'  WHERE Nr_matricol = {$_SESSION['matricol']};";



if (mysqli_query($conn, $sql)){
    header("Location: ../Index/Succes.html");
}
else{
    echo "nem megy";
}

echo $sql;