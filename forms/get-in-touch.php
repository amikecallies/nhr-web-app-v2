<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$subject=$_POST['subject'];
$email=$_POST['email'];
$message=$_POST['message'];

// Modify the path in the require statement below to refer to the 
// location of your Composer autoload.php file.
require '../vendor/autoload.php';

// Instantiate a new PHPMailer 
$mail = new PHPMailer;

// Tell PHPMailer to use SMTP
$mail->isSMTP();

//$mail->SMTPDebug = 2;

// Replace sender@example.com with your "From" address. 
// This address must be verified with Amazon SES.
$mail->setFrom('acallies15@apu.edu', 'New Home Realty  Admin');
// Replace recipient@example.com with a "To" address. If your account 
// is still in the sandbox, this address must be verified.


//$mail->addAddress('acallies15@apu.edu', 'Adrian Callies');// Remove and change after beta
$mail->addAddress('Arcallies@aol.com', 'Arlington Callies');
$mail->addAddress('newhomerealty@aol.com', 'Pamela Callies');

// Replace smtp_username with your Amazon SES SMTP user name.
$mail->Username = 'AKIA4HJMF54KVEZ37AGP';

// Replace smtp_password with your Amazon SES SMTP password.
$mail->Password = 'BNcRpp8C/A/RZir6DcYV20lL0V7oJoOxdjA+KEj9kiB8';
    
// Specify a configuration set. If you do not want to use a configuration
// set, comment or remove the next line.
//$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
 
// If you're using Amazon SES in a region other than US West (Oregon), 
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
// endpoint in the appropriate region.
$mail->Host = 'email-smtp.us-west-2.amazonaws.com';// May be subject to change since most emails will be sent in the Texas Area

// The subject line of the email
$mail->Subject = 'New Home Realty Website: New Message!';

// The HTML-formatted body of the email
$mail->Body = "<h1>Someone has contacted New Home Realty!</h1>
<p>The person who has contacted you is named,"." ".$name.". The following message is below:</p><br>
<i>"." ".$message. " <b>Please respond at to the following address:<i>".$email;



// Tells PHPMailer to use SMTP authentication
$mail->SMTPAuth = true;

// Enable TLS encryption over port 587
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Tells PHPMailer to send HTML-formatted email
$mail->isHTML(true);

// The alternative email body; this is only displayed when a recipient
// opens the email in a non-HTML email client. The \r\n represents a 
// line break.
$mail->AltBody = "Email Test\r\nThis email was sent through the 
    Amazon SES SMTP interface using the PHPMailer class.";


// Change UX Design
if(!$mail->send()) {
    echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
} else {
    $messageconfirmed = "Your message was succesfully sent!";
    echo "<script type='text/javascript'>alert('$messageconfirmed');</script>";
    echo "<script type='text/javascript'>window.location='index.html';</script>";
}
?>
