<?php

if(isset($_POST['izmeniobrok'])){
    include "konekcija.php";
    $id = $_POST['skrivenob'];
    $ime=$_POST['meal'];
    $errors=[];
    $reIme = "/^[A-Z][a-z]{2,9}$/";


    if(!$ime) {
        array_push($errors, "Polje za ime je obavezno.");
    } elseif(!preg_match($reIme, $ime)) {
        array_push($errors, "Polje za ime nije dobrog formata.");
    }



    if(count($errors)) {
        $code = 422;
        $data = $errors;
    }

    else{
        try{

            $upit = "UPDATE obrok SET naziv=:ime WHERE idObrok=:id";
            $prepare=$konekcija->prepare($upit);
            $prepare->bindParam(":ime", $ime);
            $prepare->bindParam(":id", $id);


            $uspesno=$prepare->execute();

            header("Location: ../admin.php");

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }










}

