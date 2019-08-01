<?php
header("Content-type: application/json");


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
        $upit = "INSERT into korisnik (ime, prezime, email,lozinka,uloga_id,korisnicko_ime)
          values (:ime, :prezime, :email,:lozinka,2,:korisnicko_ime)";
        $statement = $konekcija->prepare($upit);
        $statement->bindParam(":ime", $firstName);
        $statement->bindParam(":prezime", $lastName);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":lozinka", $password);
        $statement->bindParam(":korisnicko_ime", $username);


        try {
            // insert u bazu
            $code = $statement->execute() ? 201 : 500;
            echo "Uneli ste korisnika u bazu";


        } catch(PDOException $e) {
            $code = 409;
            $data = $e->getMessage();
        }
    }


}


http_response_code($code);

echo json_encode($data);
