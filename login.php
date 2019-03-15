<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "szakdolgozat";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    $matricol = mysqli_real_escape_string($conn, $_GET['szam']);
    $pwd = mysqli_real_escape_string($conn, $_GET['passw']);

    //error handlers
    //check empty inputs
    if (empty($matricol) || empty($pwd))
    {
        echo "Irj be valamit";
    }
    else{
        $sql = "SELECT * FROM diakok WHERE Nr_matricol='$matricol'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1)
        {
            echo "nem jo";
        }
        else
        {
            if ($row = mysqli_fetch_assoc($result))
            {
                //de-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['Password']);
                if ($hashedPwdCheck == false)
                {
                    echo "nem jo pwd";
                }
                elseif($hashedPwdCheck == true)
                {
                    //login in the user here
                    $_SESSION['matricol'] = $row['Nr_matricol'];
                    $_SESSION['email'] = $row['Email'];
                    //header("Location: ../index.php?login=succes");

                    echo $_SESSION['matricol'];

                    //select data from database
                    $sql = "SELECT Csaladnev, Keresztnev FROM tanar";
                    $result = mysqli_query($conn, $sql);

                    //echo mysqli_num_rows($result);
                    /* fetch associative array */
                    if (mysqli_num_rows($result) > 0)
                      while ($row = mysqli_fetch_array($result)) {
                           echo $row["Csaladnev"]." ".$row["Keresztnev"];
                           echo "<br>";
                           }
                      }
            }
        }
    }
mysqli_close($conn);

?>