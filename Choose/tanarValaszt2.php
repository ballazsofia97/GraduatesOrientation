<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "szakdolgozat";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$matricol = $_SESSION['matricol'];

$keresztnev = $_POST['tanar'];

if (isset($_POST['submit'])){

    $query = "SELECT TanarID FROM tanar WHERE Keresztnev = '$keresztnev';";
    $result = mysqli_query($conn, $query);

    while ($row = $result->fetch_assoc()) {
        $tanarid = $row['TanarID'];
    $sql = "UPDATE szakdolgozatok SET TanarID2 = $tanarid WHERE Nr_matricol = {$_SESSION['matricol']};";
    }


        $sql = "UPDATE szakdolgozatok SET TanarID2 = $tanarid WHERE Nr_matricol = {$_SESSION['matricol']};";


    if(mysqli_query($conn, $sql)){
        header("Location: ../Index/Succes.html");
    }

    echo $tanarid;

}
?>