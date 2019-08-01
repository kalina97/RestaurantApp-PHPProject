<?php
session_start();
header("Content-type: application/json");

//brisanje korisnika iz baze




// Statusni kod za vracanje klijentu kao rezultat AJAX zahteva
$statusCode = 404;


// Ukoliko nije POST zahtev

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Ne mozete pristupiti ovoj stranici!";
}


if(isset($_POST['id'])){

    $id = $_POST['id'];
    include "konekcija.php";


    $upit51=$konekcija->prepare("DELETE FROM anketa_korisnik WHERE idOdgovor=:id");
    $upit51->bindParam(':id', $id);
    $upit = $konekcija->prepare("DELETE FROM odgovor WHERE id = :id;");
    $upit->bindParam(':id', $id);

    try{
        $rezultat = $upit->execute();
        $rez2=$upit51->execute();
        if($rezultat && $rez2){

            $statusCode = 204;
        } else {
            $statusCode = 500;
        }
    }
    catch(PDOException $e){
        $statusCode = 500;
    }
}

// Vracanje statusnog koda ka klijentu (JS)
http_response_code($statusCode);






