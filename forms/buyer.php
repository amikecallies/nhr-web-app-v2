<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zipcode=$_POST['zipcode'];
$email=$_POST['email'];
$cellphone=$_POST['cellphone'];
$workphone=$_POST['workphone'];
$message1=$_POST['message1'];
$message2=$_POST['message2'];
$numstories=$_POST['numstories'];
$numbedrooms=$_POST['numbedrooms'];
$numbathrooms=$_POST['numbathrooms'];
$numareas=$_POST['numareas'];
$size=$_POST['size'];
$live=$_POST['live'];
$buytime=$_POST['buytime'];
$monthrate=$_POST['monthrate'];
$sqft=$_POST['sqft'];
$approve=$_POST['approve'];
$credit=$_POST['credit'];
$price=$_POST['price'];

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


//$mail->addAddress('acallies15@apu.edu', 'Adrian Callies'); Use this email only for testing this feature
$mail->addAddress('Arcallies@aol.com', 'Arlington Callies');
$mail->addAddress('newhomerealty@aol.com', 'Pamela Callies');

// Replace smtp_username with your Amazon SES SMTP user name.
$mail->Username = getenv('AMAZON_USER');

// Replace smtp_password with your Amazon SES SMTP password.
$mail->Password = getenv('AMAZON_PASSWORD');
    
// Specify a configuration set. If you do not want to use a configuration
// set, comment or remove the next line.
//$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
 
// If you're using Amazon SES in a region other than US West (Oregon), 
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
// endpoint in the appropriate region.
$mail->Host = 'email-smtp.us-west-2.amazonaws.com';// May be subject to change since most emails will be sent in the Texas Area

// The subject line of the email
$mail->Subject = 'New Home Realty Website: New Form Submission!';

// The HTML-formatted body of the email
$mail->Body = "<h1>Someone has submitted a new Buyer's Form at New Home Realty!</h1>
<p>".$fname." has filled out this form. Please review the buyer's information below:</p>
<i><ol>
<li>Address: ".$address."</li>
<li>City: ".$city."</li>
<li>State: ".$state."</li>
<li>Zipcode: ".$zipcode."</li>
<li>Cell Phone: ".$cellphone."</li>
<li>Work Phone: ".$workphone."</li>
<li>How did you hear about us?: ".$message1."</li>
<li>Do you have any special requests?: ".$message2."</li>
<li>Number of Stories: ".$numstories."</li>
<li>Number of Bedrooms: ".$numbedrooms."</li>
<li>Number of Bathrooms: ".$numbathrooms."</li>
<li>Number of Living Areas: ".$numareas."</li>
<li>House Size: ".$size."</li>
<li>Where do you want to live?: ".$live."</li>
<li>How soon are you looking to buy?: ".$buytime."</li>
<li>If currently renting, what is your monthly rate?: ".$monthrate."</li>
<li>Square Footage: ".$sqft."</li>
<li>Have you been pre-approved?: ".$approve."</li>
<li>Credit Score: ".$credit."</li>
<li>Price Range: ".$price."</li>
</ol>
<b>Please respond to ".$fname." at the following address: </b>".$email."</i>";

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


//  Redirect to the home page and confirm email submission
if(!$mail->send()) {
    echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
} else {
    header("Location: ../form-submit.html");
}
?>
