<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "szakdolgozat";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$cim = $_POST['tema'];

$sql = "UPDATE szakdolgozatok SET Cim ='$cim' WHERE Nr_matricol = {$_SESSION['matricol']}; ";

  if (mysqli_query($conn, $sql)){
      header("Location: ../Index/Succes.html");
  }
  else{
      echo "nem";
  }

  echo $sql;


?>