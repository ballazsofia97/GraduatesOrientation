<?php
session_start();
//var_dump($_SESSION);

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "szakdolgozat";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$date = date('Y-m-d');


//This is the directory where images will be saved
$target = "C:\wamp64\www\szakdolgozat\dolgozatok/";

if($_FILES['Filename']['error'] > 0){
    die('An error ocurred when uploading.');
}
elseif(file_exists($target . $_FILES['Filename']['name'])){
    die('File with that name already exists.');
}

elseif($_FILES['Filename']['name'] != ""){
    move_uploaded_file($_FILES['Filename']['tmp_name'], $target . $_FILES['Filename']['name'])
    or
    die('Error uploading file - check destination is writeable.');
}


if ($_POST['vegleges'] == 'igen'){
    $query = "UPDATE szakdolgozatok SET Vegleges = 1 WHERE Nr_matricol = {$_SESSION['matricol']};";
}
else{
    $query = "UPDATE szakdolgozatok SET Vegleges = 0 WHERE Nr_matricol = {$_SESSION['matricol']}";
}

$query2 = "UPDATE szakdolgozatok SET FeltDatum = '$date' WHERE Nr_matricol = {$_SESSION['matricol']}";
$query3 = "UPDATE szakdolgozatok SET FileNev = '{$_FILES['Filename']['name']}' WHERE Nr_matricol = {$_SESSION['matricol']}";

mysqli_query($conn, $query);
mysqli_query($conn, $query2);
mysqli_query($conn, $query3);


if (mysqli_query($conn, $query) && mysqli_query($conn, $query2) && mysqli_query($conn, $query3)){
    header("Location: ../Index/Succes.html");
}
else{
    echo "Nem";
}
?>

