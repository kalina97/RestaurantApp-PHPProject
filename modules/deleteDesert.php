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



    $upit4 = $konekcija->prepare("DELETE a2 FROM desert AS a1 INNER JOIN cena_deserta AS a2 where a1.idCenaDes=a2.idCenaDes and a2.idCenaDes=:id");
    $upit4->bindParam(':id', $id);

    $upit5 = $konekcija->prepare("DELETE a2 FROM desert_sastojci AS a1 INNER JOIN sastojci_za_desert AS a2
WHERE a1.idSasDe=a2.idSasDe AND a2.idSasDe=:id");
    $upit5->bindParam(':id', $id);



    $upit3 = $konekcija->prepare("DELETE FROM desert WHERE idDesert = :id;");
    $upit3->bindParam(':id', $id);

    $upit2 = $konekcija->prepare("DELETE FROM desert_sastojci WHERE idDesert = :id;");
    $upit2->bindParam(':id', $id);



    try{

        $rezultat4 = $upit4->execute();
        $rezultat5 = $upit5->execute();
        $rezultat3 = $upit3->execute();
        $rezultat2 = $upit2->execute();


        if($rezultat2 && $rezultat3 && $rezultat4 && $rezultat5){

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






