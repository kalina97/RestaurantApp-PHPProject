<?php

if(isset($_POST['izmenilink'])){
    include "konekcija.php";
    $id = $_POST['skrivenod'];
    $ime=$_POST['imelink'];
    $href=$_POST['hreflink'];
    $errors=[];
    $reIme = "/^[A-Z][a-z0-9]+$/";


    if(!$ime) {
        array_push($errors, "Polje za ime je obavezno.");
    } elseif(!preg_match($reIme, $ime)) {
        array_push($errors, "Polje za ime nije dobrog formata.");
    }



    if(!$href) {
        array_push($errors, "Polje za putanju je obavezno.");
    } elseif(empty($href)) {
        array_push($errors, "Polje za putanju je obavezno");
    }



    if(count($errors)) {
        $code = 422;
        $data = $errors;
    }

    else{
        try{

            $upit = "UPDATE linkovi SET imeLinka=:ime,putanja=:putanja WHERE idLink=:id";
            $prepare=$konekcija->prepare($upit);
            $prepare->bindParam(":ime", $ime);
            $prepare->bindParam(":putanja", $href);
            $prepare->bindParam(":id", $id);


            $uspesno=$prepare->execute();

            header("Location: ../admin.php");

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }










}

