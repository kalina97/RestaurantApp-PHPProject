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

// Dohvatanje ID korisnika, prosledjenog putem AJAX-a

if(isset($_POST['id'])){

    $id = $_POST['id'];
    include "konekcija.php";


    $upit = $konekcija->prepare("DELETE FROM korisnik WHERE id = :id;");
    $upit->bindParam(':id', $id);
    $upit2 = $konekcija->prepare("DELETE FROM anketa_korisnik WHERE idKorisnik = :id;");
    $upit2->bindParam(':id', $id);


    try{
        $rezultat = $upit->execute();
        $rezultat1 = $upit2->execute();


        if($rezultat && $rezultat1){

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






