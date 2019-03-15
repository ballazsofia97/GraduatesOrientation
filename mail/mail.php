<?php
// Check for empty fields
/*if(empty($_POST['email']))  {
   echo "No arguments Provided!";
   return false;
   }

//$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = $_POST['email'];
//$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = "bla";

// Create the email and send the message
$to = $_POST['email']; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  Lofasz";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:Message:\n$message";
$headers = "From: bennokava@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);

if(mail($to,$email_subject,$email_body,$headers))
{
    echo "Mail Sent Successfully";
}else{
    echo "Mail Not Sent";
}
return true;  */


require '../../szakdolgozat/phpmailer/src/Exception.php';
require '../../szakdolgozat/phpmailer/src/PHPMailer.php';
require '../../szakdolgozat/phpmailer/src/SMTP.php';
require '../../szakdolgozat/autoload.php';

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "szakdolgozat";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$email = $_POST['email'];
$matricol = $_POST['szam'];

$sql = "SELECT * FROM diakok WHERE Nr_matricol='$matricol' AND Email='$email'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck < 1)
{
    echo "nem jo";
}
else
{
    /*$mailto = $email;
    $mailMsg = "kjsd";
    $mailSub = "New Password";

    $mail = new PHPMailer();
    $mail ->IsSmtp();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = "smtp.gmail.com";
    $mail ->Port = 465; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = "Biba Enno";
    $mail ->Password = "";
    $mail ->SetFrom("bennokava@gmail.com");
    $mail ->Subject = $mailSub;
    $mail ->Body = $mailMsg;
    $mail ->AddAddress($mailto);*/

    if(isset($_POST['submit']))
    {
        echo "Mail Sent";
        $newpassword = 0000;
        $newHashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
        $query = "UPDATE diakok SET Password = '$newHashedPassword' WHERE  Nr_matricol='$matricol' AND Email='$email'";
    }
    else
    {
        echo "Mail Not Sent";

    }
}
?>
