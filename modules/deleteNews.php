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


    $upit88=$konekcija->prepare("DELETE FROM komentari where idVest=:id");
    $upit88->bindParam(':id', $id);
    $upit = $konekcija->prepare("DELETE FROM vesti WHERE idVest = :id;");
    $upit->bindParam(':id', $id);

    try{
        $rezultat = $upit->execute();
        $rezultat44 = $upit88->execute();
        if($rezultat && $rezultat44){

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






