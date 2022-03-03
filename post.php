<?php

use PHPMailer\ PHPMailer\ PHPMailer;
use PHPMailer\ PHPMailer\ Exception;

if ( !empty( $_REQUEST[ '_NAME' ] ) && !empty( $_REQUEST[ '_LAST_NAME' ] ) && !empty( $_REQUEST[ '_COMPANY' ] ) && !empty( $_REQUEST[ '_Email' ] ) && !empty( $_REQUEST[ '_Phone' ] ) && !empty( $_REQUEST[ '_COMMENT' ] ) ) {


  require 'phpmailer641/src/PHPMailer.php';
  require 'phpmailer641/src/OAuth.php';
  require 'phpmailer641/src/Exception.php';
  require 'phpmailer641/src/SMTP.php';
  require 'phpmailer641/src/POP3.php';

  $mail = new PHPMailer( true );
  try {
    //Server settings
    //$mail->SMTPDebug = 2;
    //$mail->isSMTP();
    //$mail->Host = 'email-smtp.us-east-1.amazonaws.com';
    //$mail->SMTPAuth = true;
    //$mail->Username = 'AKIAYJN4LZW5IN2S6C4K';
    //$mail->Password = 'BN8ls80MzMMxTgPfeSG0vBK7N2hzd9FHOW5WwIwRxsFj';
    //$mail->SMTPSecure = 'tls';
    //$mail->Port = 587;

    $mail->Host = 'localhost';
    $mail->Port = 25;
    $mail->SMTPAuth = false;
    $mail->SMTPSecure = false;
    $mail->SMTPAutoTLS = false;

    //Recipients
    $mail->setFrom( 'info@timeusapps.net' );
    $mail->addAddress( 'dubeydilip@yahoo.com' );
	$mail->addAddress( 'akash@stringventures.ai' );
	$mail->addBCC( 'dhiraj.s@timeus.in' );

    //Content
    $mail->isHTML( true );
    $mail->Subject = 'Sutra.AI Website Enquiry';
    $mail->Body = '<html>
        <body style="background:#FCFCFC">
        <div style="background: #fcfcfc;padding: 10px;">
        <div style="width:40%;background:#FFF; padding:10px">
        <table width="100%" cellpadding="2" cellspacing="2" border="0">
		<tr><td ><strong>First Name :-</strong></td> <td>' . $_REQUEST[ '_NAME' ] . '<br></td></tr>
		<tr><td ><strong>Last Name :-</strong></td> <td>' . $_REQUEST[ '_LAST_NAME' ] . '<br></td></tr>
        <tr><td ><strong>Company :-</strong></td> <td>' . $_REQUEST[ '_COMPANY' ] . '<br></td></tr>
		<tr><td ><strong>E-Mail :-</strong></td> <td>' . $_REQUEST[ '_Email' ] . '<br></td></tr>
        <tr><td ><strong>Phone :-</strong></td> <td>' . $_REQUEST[ '_Phone' ] . '<br></td></tr>
		<tr><td ><strong>Comment :-</strong></td> <td>' . $_REQUEST[ '_COMMENT' ] . '<br></td></tr>	
        <tr><td ><strong>Date :-</strong></td> <td>' . date( "d-M-Y h:s:ia" ) . '<br></td></tr>
        </table>
        </div>
        </div>
        </body>
        </html>';


    $sent = $mail->send();

    if ( $sent ) {
      $res = "Thank you for your interest. We will get back to you soon.";
      echo json_encode( $res );
    }


  } catch ( Exception $e ) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
} else {
  $res = 'Your message was not Sent!';
  echo json_encode( $res );
}
?>