<?php
//here we configured PhPmailer with mailtrap server
require_once "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = 'ca7aadc509b102';
$phpmailer->Password = 'ea2e7ccadd2a1a';
// $mail->SMTPSecure = "tls";  

// echo "hello bitches";

if(isset($_POST['submit'])){
    
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];

    
    $phpmailer->From = $email;
    $phpmailer->FromName = $name;

    $phpmailer->addAddress("shresthasaimon9@gmail.com", "Saiman Shrestha");

    $phpmailer->isHTML(true);

    $phpmailer->Subject = "Subject Text";
    $phpmailer->Body = "<i>$message</i>";
    $phpmailer->AltBody = "This is the Email From the ToHome";

try {
    $phpmailer->send();
    header("Location: contact.html");
    echo "Message has been sent successfully";

} catch (Exception $e) {
    echo "Mailer Error: " . $phpmailer->ErrorInfo;
}
 

}

?>