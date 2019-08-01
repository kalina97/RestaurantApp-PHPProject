<?php

if(isset($_POST['izmenires'])){
include "konekcija.php";
    $id = $_POST['skriveno'];

    $ime=$_POST['imence'];
    $email=$_POST['emaili'];
    $datum=$_POST['datums'];
    $vreme=$_POST['times'];
    $gosti=$_POST['gosti'];

    $reEmail = "/^[a-z][A-z\.\-0-9]{4,35}\@[a-z]{2,5}(\.[a-z]{2,5}){1,3}$/";
    $errors=[];

    $reIme = "/^[A-Z][a-z]{2,9}$/";


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


    if(!$ime) {
        array_push($errors, "Polje za ime je obavezno.");
    } elseif(!preg_match($reIme, $ime)) {
        array_push($errors, "Polje za ime nije dobrog formata.");
    }




    if(!$email) {
        array_push($errors, "Polje za email je obavezno.");
    } elseif(!preg_match($reEmail, $email)) {
        array_push($errors, "Polje za email nije dobrog formata.");
    }


    if(isset($_POST['gosti']) && $_POST['gosti'] == '0') {
        array_push($errors, "Izaberite broj gostiju");
    }

    if(count($errors)) {
        $code = 422;
        $data = $errors;
    }

    else{
        try{

            $upit = "UPDATE rezervacija_stola SET ime=:ime,email=:email,datum=:datum,vreme=:vreme,brGostiju=:guests WHERE idRez=:id";
            $prepare=$konekcija->prepare($upit);
            $prepare->bindParam(":ime", $ime);
            $prepare->bindParam(":email", $email);
            $prepare->bindParam(":datum", $datum);
            $prepare->bindParam(":vreme", $vreme);
            $prepare->bindParam(":guests", $gosti);
            $prepare->bindParam(":id", $id);


                $uspesno=$prepare->execute();

            header("Location: ../admin.php");

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }










}

