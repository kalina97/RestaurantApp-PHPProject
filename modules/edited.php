<?php

if(isset($_POST['izmeni'])){
    include "konekcija.php";
    $id = $_POST['skriveno'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    if(isset($_POST['aktivan'])){
        $aktivan=$_POST['aktivan'];
    }
    //$akt = settype($aktivan,'int');
    $reEmail = "/^[a-z][A-z\.\-0-9]{4,35}\@[a-z]{2,5}(\.[a-z]{2,5}){1,3}$/";
    $reUsername = "/^[a-z0-9\_]{4,15}$/";
    $reFirstName = "/^[A-Z][a-z]{2,9}$/";
    $reLastName = "/^[A-Z][a-z]{2,14}$/";


    $uloga = $_POST['uloga'];

    $errors = [];
    $reuloga = "/^[12]$/";


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




    if(!$reuloga) {
        array_push($errors, "Polje za ulogu je obavezno.");
    } elseif(!preg_match($reuloga, $uloga)) {
        array_push($errors, "Polje za ulogu nije dobrog formata.");
    }

    /*
    if(!$aktivan) {
        array_push($errors, "Polje za aktivan je obavezno.");
    }
    elseif(!preg_match($reakt, $aktivan)) {
        array_push($errors, "Polje za aktivan nije dobrog formata.");
    }

*/
    if(count($errors)) {
        $code = 422;
        $data = $errors;

    }
         else{
             try{
        $upit = "UPDATE korisnik SET ime=:ime, prezime=:prezime, email=:email,aktivan=:aktivan,uloga_id=:uloga,korisnicko_ime=:username WHERE id=:id";
        $prepare=$konekcija->prepare($upit);
        $prepare->bindParam(":ime", $firstName);
        $prepare->bindParam(":prezime", $lastName);
        $prepare->bindParam(":email", $email);
        $prepare->bindParam(":aktivan", $aktivan);
        $prepare->bindParam(":username", $username);
        $prepare->bindParam(":uloga", $uloga);
        $prepare->bindParam(":id", $id);


            $uspesno=$prepare->execute();
            echo "Uspesno";
            header("Location: ../admin.php");

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }


    }
}

echo json_encode($data);
