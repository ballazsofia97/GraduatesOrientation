<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "szakdolgozat";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else //if(isset($_POST['submit']))
{
    //getting the data from the form
    $matricol = mysqli_real_escape_string($conn, $_POST['matricol']);
    $csaladnev = mysqli_real_escape_string($conn, $_POST['csaladnev']);
    $keresztnev = mysqli_real_escape_string($conn, $_POST['keresztnev']);
    $cnp = mysqli_real_escape_string($conn, $_POST['cnp']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefon = mysqli_real_escape_string($conn, $_POST['telefonszam']);
    $szak = mysqli_real_escape_string($conn, $_POST['szak']);
    $datum = mysqli_real_escape_string($conn, $_POST['datum']);
    $szesszio = mysqli_real_escape_string($conn, $_POST['szesszio']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //reformatting the date
    $newDate = date("Y-m-d", strtotime($datum));

    //checking if fileds are empty
    if (empty($matricol) || empty($csaladnev) || empty($keresztnev) || empty($cnp) || empty($email) || empty($telefon) || empty($newDate) || empty($szak) || empty($szesszio) || empty($pwd))
    {
        exit();
    }
    else
    {
       /* //checking if inputs are correct
        if (!preg_match("/^[a-zA-Z]*$/", $csaladnev) || !preg_match("/^[a-zA-Z]*$/", $keresztnev))
            {
                echo 1;
                exit();
            }
            else
            {
                //validating email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo 2;
                    exit();
                    }
                    else
                    {*/
                        //hashing the password
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                        //insert the user into the databas
                        $sql = "INSERT INTO diakok VALUES ('$matricol', '$csaladnev', '$keresztnev', '$szak', '$telefon', '$email', '$newDate', '$szesszio','$cnp', '$hashedPwd')";

                        mysqli_query($conn, $sql);
                        mysqli_select_db($conn, $dbName);

                        echo $sql;

                        if (mysqli_query($conn, $sql))
                        {
                            echo "Beirva";
                            header("Location: temak.html");
                        }
                        else
                        {
                            //echo "Hi, I'm PHP and I won't insert data in your database, because I'm a little bitch";
                            echo "Regisztralas sikeres";
                            header("Location: Index/Succes.html");
                        }
                    }


    }

mysqli_close($conn);
?>

