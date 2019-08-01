<?php
session_start();
header("Content-type: application/json");
include "konekcija.php";

$code = 404;
$data = null;

if(isset($_POST['send'])) {

    $datum = $_POST['datum'];
    $email = $_SESSION['korisnik']->email;
    $ime = $_SESSION['korisnik']->ime;
    $errors = [];
    //$reIme = "/^[A-Z][a-z]{2,9}$/";
    $reEmail = "/^[a-z][A-z\.\-0-9]{4,35}\@[a-z]{2,5}(\.[a-z]{2,5}){1,3}$/";
    $vreme= $_POST['vreme'];
    $gosti=$_POST['gosti'];

    if(!$datum) {
        array_push($errors, "Polje za datum dolaska je obavezno.");
    } elseif(empty($datum)) {
        array_push($errors, "Polje za datum dolaska je obavezno");
    }

    if(!$vreme) {
        array_push($errors, "Polje za vreme dolaska je obavezno.");
    } elseif(empty($vreme)) {
        array_push($errors, "Polje za vreme dolaska je obavezno");
    }

        /*
    if(!$ime) {
        array_push($errors, "Polje za ime je obavezno.");
    } elseif(!preg_match($reIme, $ime)) {
        array_push($errors, "Polje za ime nije dobrog formata.");
    }

        */


      /*
    if(!$email) {
        array_push($errors, "Polje za email je obavezno.");
    } elseif(!preg_match($reEmail, $email)) {
        array_push($errors, "Polje za email nije dobrog formata.");
    }
      */


    if(isset($_POST['gosti']) && $_POST['gosti'] == '0') {
        array_push($errors, "Izaberite broj gostiju");
    }



    if(count($errors)) {
        $code = 422;
        $data = $errors;
    } else {
        try{

        $upit = "INSERT into rezervacija_stola (ime,email,datum,vreme,brGostiju)
          values (:ime,:email,:datum,:vreme,:brGost)";
        $statement = $konekcija->prepare($upit);
        $statement->bindParam(":ime", $ime);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":datum", $datum);
        $statement->bindParam(":vreme", $vreme);
        $statement->bindParam(":brGost", $gosti);



        $rez=$statement->execute();


            // insert u bazu
            $code =201;


        } catch(PDOException $e) {
            $code = 409;
            $data = $e->getMessage();
        }
    }


}
http_response_code($code);

echo json_encode($data);
