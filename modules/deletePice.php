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



    $upit4 = $konekcija->prepare("DELETE a2 FROM pice AS a1 INNER JOIN cena_pica AS a2 where a1.idCenaPica=a2.idCenaPica and a2.idCenaPica=:id");
    $upit4->bindParam(':id', $id);

    $upit5 = $konekcija->prepare("DELETE a2 FROM pice_sastojci AS a1 INNER JOIN sastojci_za_pice AS a2
WHERE a1.idSasPice=a2.idSasPice AND a2.idSasPice=:id");
    $upit5->bindParam(':id', $id);


    $upit2 = $konekcija->prepare("DELETE FROM pice_sastojci WHERE idPice = :id;");
    $upit2->bindParam(':id', $id);

    $upit3 = $konekcija->prepare("DELETE FROM pice WHERE idPice = :id;");
    $upit3->bindParam(':id', $id);





    try{

        $rezultat4 = $upit4->execute();
        $rezultat5 = $upit5->execute();
        $rezultat2 = $upit2->execute();
        $rezultat3 = $upit3->execute();



        if($rezultat4 && $rezultat5 && $rezultat2 && $rezultat3){

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






