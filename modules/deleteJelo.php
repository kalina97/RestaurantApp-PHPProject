<?php
//session_start();
//header("Content-type: application/json");

//brisanje korisnika iz baze




// Statusni kod za vracanje klijentu kao rezultat AJAX zahteva
$statusCode = 404;


// Ukoliko nije POST zahtev

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Ne mozete pristupiti ovoj stranici!";
}


if(isset($_POST['id'])){
    //var_dump($_POST);
    $id = $_POST['id'];
    include "konekcija.php";

    try{


        $upit4 = $konekcija->prepare("DELETE a2 FROM jelo AS a1 INNER JOIN cena_jela AS a2 where a1.idCenaJela=a2.idCenaJela and a2.idCenaJela=:id");
    $upit4->bindParam(':id', $id);


    $upit5 = $konekcija->prepare("DELETE a2 FROM jelo_sastojci AS a1 INNER JOIN sastojci_za_jelo AS a2
    WHERE a1.idSastojak=a2.idSastojak AND a2.idSastojak=:id");
    $upit5->bindParam(':id', $id);


    $upit2 = $konekcija->prepare("DELETE FROM jelo_sastojci WHERE idJelo = :id;");
    $upit2->bindParam(':id', $id);

    $upit3 = $konekcija->prepare("DELETE FROM jelo WHERE idJelo = :id;");
    $upit3->bindParam(':id', $id);


        $rezultat4=$upit4->execute();
        $rezultat5=$upit5->execute();
        $rezultat2=$upit2->execute();
        $rezultat3=$upit3->execute();


        if($rezultat4 && $rezultat5 && $rezultat2 && $rezultat3){

            $statusCode = 204;
        } else {
            $statusCode = 503;
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
       $statusCode = 500;
    }
}

// Vracanje statusnog koda ka klijentu (JS)
http_response_code($statusCode);






