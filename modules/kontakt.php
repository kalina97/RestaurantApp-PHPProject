<?php
//header("Content-type: application/json");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$code=404;
$data=null;
if (isset($_POST["send"]) && $_SERVER['REQUEST_METHOD']=="POST") {
    require_once "konekcija.php";
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $rePass="/^([A-Za-z\d]){8,}$/";
    $comment = $_POST['comment'];
    $reName = "/^[A-Z][a-z]{2,14}$/";
    $errors = [];
    if (!preg_match($reName, $firstName)) {
        $errors[] = "greska kod imena";
    }

    if (!preg_match($rePass, $password)) {
        $errors[] = "greska kod lozinke";
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "greska email";
    }
    if (strlen($comment) == 0) {
        $errors[] = "morate uneti komentar";
    }

    if (count($errors)) {
        $code=422;
        $data=$errors;
        //echo json_encode(["eror" => "422"]);
        //http_response_code(422);


    } else {

        $code=201;
        //http_response_code(200);
    //}

 //if($code == 200){
     //$mail = new PHPMailer(true);
     try{

         $mail = new PHPMailer(true);
         //$mail->SMTPDebug = 3;
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = $email;
         $mail->Password = $password;

         $mail->SMTPSecure = 'tls';
         $mail->Port = 587;

         $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );

         $mail->setFrom('nikola.kalincevic.40.16@ict.edu.rs','Contact form');
         $mail->addAddress('kalincevicnikola8@gmail.com','nikola97');
         $mail->isHTML(true);
         $mail->Subject = 'Message from ' . $firstName;
         $mail->Body = $comment . " message from " . $email;
         /*if(!$mail->send()) {
             echo json_encode(["odg"=>"Greska"]);
         }
         else {
             $code=201;
             echo json_encode(["odg"=>"Usoeh"]);
         }
         */
         $mail->send();
         //$code=201;

            //echo json_encode(["odg" => "uspesno"]);
         //http_response_code(201);

     }
     catch (Exception $e){
         $code=500;

         echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
     }
 }
}
echo json_encode($data);
http_response_code($code);
