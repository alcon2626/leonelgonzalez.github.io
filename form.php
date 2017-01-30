<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Email Sent!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php
$UserName = "";
$UserEmail = "";
$UserMessage = "";
$MyEmail = "alcon2626@gmail.com";
//variables from HTML
if(!isset($_POST['name'])) {
	//If not isset -> set with dumy value 
	$_POST['name'] = "undefine";
	echo "Name not picked up <br>";
}else{
	$UserName = $_POST['name'];
}
if(!isset($_POST['email'])) {
 	  $_POST['email'] = "undefine";
}else{
	$UserEmail = $_POST['email'];
}
if(!isset($_POST['message'])) {
 	  $_POST['message'] = "undefine";
}else{
	$UserMessage = $_POST['message'];
}
?>

<?php	
//send mail here
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput='html';
//Set the hostname of the mail server
$mail->Host='smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port=587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure='tls';
//Whether to use SMTP authentication
$mail->SMTPAuth=true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username="alcon2626@gmail.com";
//Password to use for SMTP authentication
$mail->Password="aizen39141";
//Set who the message is to be sent from
$mail->setFrom($UserEmail, $UserName);
//Set an alternative reply-to address
$mail->addReplyTo($UserEmail,$UserName);
//Set who the message is to be sent to
$mail->addAddress($MyEmail, "Leonel Website");
//Set the subject line
$mail->Subject='Message From my Website';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = "Message: ". ' ' .$UserMessage;
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('img/phpmailerlogo.jpg');
//send the message, check for errors
if(!$mail->send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	//echo "Message sent!";
}

header( "refresh:12;url=http://inisope-inc--alcon2626842133.codeanyapp.com/Developer-master/Developer-master/index.html" );
?>
	 <!-- Container -->
	<div class="container">
  <div class="jumbotron feature">
    <h1 style="color: #BA2737;">Email successfully sent!</h1>
    <p style="color: #BA2737;">Your message have been sent and I will contact you soon, thanks for visiting my page and enjoy your day =P!</p> 
  </div>
  <div class="row">
    <div class="col-sm-12">
      <h3 style="color: #BA2737;">Rdirecting....</h3>
      <p style="color: #BA2737;">You will be redirected in <span id="counter">10</span> second(s).</p>
			<script type="text/javascript">
			function countdown() {
    	var i = document.getElementById('counter');
    		if (parseInt(i.innerHTML)<=0) {
        		location.href = 'http://inisope-inc--alcon2626842133.codeanyapp.com/Developer-master/Developer-master/index.html';
    				}
    			i.innerHTML = parseInt(i.innerHTML)-1;
				}
				setInterval(function(){ countdown(); },1000);
			</script>
    </div>
  </div>
</div>
</body>
</html>