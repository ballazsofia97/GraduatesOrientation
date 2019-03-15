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

    $query = "SELECT Nr_matricol FROM szakdolgozatok WHERE Nr_matricol = {$_SESSION['matricol']};";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    $query2 = "SELECT TanarID FROM tanar WHERE Keresztnev = '$keresztnev';";
    $result2 = mysqli_query($conn, $query2);
    //$resultCheck2 = mysqli_num_rows($result2);

    while ($row = $result2->fetch_assoc()) {
        $tanarid = $row['TanarID'];
    }

    if ($resultCheck < 1){
        $sql = "INSERT INTO szakdolgozatok (SzakdID, Nr_matricol, TanarID) VALUES ('$matricol','$matricol', '$tanarid');";
    }
    else{
        $sql = "UPDATE szakdolgozatok SET TanarID = $tanarid;";
    }

    if(mysqli_query($conn, $sql)){
        header("Location: ../Index/Succes.html");
    }

    echo $tanarid;

}
?>