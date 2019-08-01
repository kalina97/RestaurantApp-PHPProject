<?php
header("Content-type: application/json");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include "konekcija.php";

$code = 404;
$data = null;

if(isset($_POST['send'])) {

    $password = md5($_POST['sifra']);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $errors = [];
    $reEmail = "/^[a-z][A-z\.\-0-9]{4,35}\@[a-z]{2,5}(\.[a-z]{2,5}){1,3}$/";
    $reUsername = "/^[a-z0-9\_]{4,15}$/";
    $reFirstName = "/^[A-Z][a-z]{2,9}$/";
    $reLastName = "/^[A-Z][a-z]{2,14}$/";
    $rePassword = "/^([A-Za-z\d]){8,}$/";

    if(!$firstName) {
        array_push($errors, "Polje za ime je obavezno.");
    } elseif(!preg_match($reFirstName, $firstName)) {
        array_push($errors, "Polje za ime nije dobrog formata.");
    }

    if(!$lastName) {
        array_push($errors, "Polje za prezime je obavezno.");
    } elseif(!preg_match($reLastName, $lastName)) {
        array_push($errors, "Polje za prezime nije dobrog formata.");
    }

    if(!$username) {
        array_push($errors, "Polje za korisnicko ime je obavezno.");
    } elseif(!preg_match($reUsername, $username)) {
        array_push($errors, "Polje za korisnicko ime nije dobrog formata.");
    }


    if(!$email) {
        array_push($errors, "Polje za email je obavezno.");
    } elseif(!preg_match($reEmail, $email)) {
        array_push($errors, "Polje za email nije dobrog formata.");
    }



    if(!$_POST['sifra']) {
        array_push($errors, "Polje za lozinku je obavezno.");
    } elseif(!preg_match($rePassword, $_POST['sifra'])) {
        array_push($errors, "Polje za password nije dobrog formata.");
    }



    if(count($errors)) {
        $code = 422;
        $data = $errors;
    } else {
        $upit = "INSERT into korisnik (ime, prezime, email,lozinka,uloga_id,korisnicko_ime,token)
          values (:ime, :prezime, :email,:lozinka,2,:korisnicko_ime,:token)";
        $statement = $konekcija->prepare($upit);
        $statement->bindParam(":ime", $firstName);
        $statement->bindParam(":prezime", $lastName);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":lozinka", $password);
        $statement->bindParam(":korisnicko_ime", $username);

        $token = sha1(md5(time() . $email));

        $statement->bindParam(":token", $token);



        try {
            // insert u bazu
            $code = $statement->execute() ? 201 : 500;

            // slanje maila
            $mail = new PHPMailer(true);

            try {

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'auditorne.php@gmail.com';
                $mail->Password = 'Sifra123';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;


                $mail->setFrom('kalincevicnikola8@gmail.com', 'Mail');
                $mail->addAddress($email, 'Nevena Kalincevic');


                //Sadrzaj mail-a
                $mail->isHTML(true);
                $mail->Subject = 'Registracija';
                $mail->Body    = 'Verifikacija mejla: <a href="http://localhost/SajtPHP2019/modules/verifikacijaEmail.php?token='.$token.'">LINK VERIFIKACIJE</a>';


                $mail->send();


                $code = 200;
            } catch (Exception $e) {
                $code = 500;
            }


        } catch(PDOException $e) {
            $code = 409;
            $data = $e->getMessage();
        }
    }


}
http_response_code($code);

echo json_encode($data);
