<?php

// check if fields passed are empty
if(empty($_POST['name'])   ||
   empty($_POST['phone']) ||
   empty($_POST['email']) ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
    echo "No arguments Provided!";
    return false;
   }

include("class.phpmailer.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"
$host = "mail.andy-faulkner.uk";
$uname = "noreply@andy-faulkner.uk";
$to = "andrewfaulkner80@gmail.com";
$pass = "Noreply@andy-faulkner.uk";

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true;

$mail->Host = $_POST["host"];

$mail->Username = $_POST["uname"];
$mail->Password = $_POST["pass"]; 
 
$mail->From = $_POST["uname"];
$mail->FromName = "demouser";
 
$mail->AddAddress($_POST["to"],"test");
$mail->Subject = "This is the subject";
$mail->Body = "This is a sample message using SMTP authentication";
$mail->WordWrap = 50;
$mail->IsHTML(true);
$str1= "gmail.com";
$str2=strtolower($_POST["uname"]);
If(strstr($str2,$str1))
{
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
echo "<br><br> * Please double check the user name and password to confirm that both of them are correct. <br><br>";
echo "* If you are the first time to use gmail smtp to send email, please refer to this link :http://www.smarterasp.net/support/kb/a1546/send-email-from-gmail-with-smtp-authentication-but-got-5_5_1-authentication-required-error.aspx?KBSearchID=137388";
} 
else {
echo "Message has been sent";
}
}
else{
	$mail->Port = 25;
	if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
echo "<br><BR>* Please double check the user name and password to confirm that both of them are correct. <br>";
} 
else {
echo "Message has been sent";
}
}  
?>