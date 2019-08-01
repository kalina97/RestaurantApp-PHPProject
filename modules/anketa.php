<?php
session_start();
header("Content-type: application/json");
$id_korisnika = $_SESSION["korisnik"]->id;
require "konekcija.php";
if (isset($_POST["anketa"])) {
    $idOdgovora = $_POST["odgovor"];
    $idAnkete = $_POST["id"];
    $upit = "SELECT odgovor,brGlasova FROM odgovor o INNER JOIN anketa_korisnik ak ON o.id = ak.idOdgovor WHERE odgovoreno = 1 AND idAnkete=:idA AND idKorisnik = :idK";
    $prepare = $konekcija->prepare($upit);
    $prepare->bindParam(":idK", $id_korisnika);
    $prepare->bindParam(":idA", $idAnkete);
    $prepare->execute();
    $rez = $prepare->fetch();
    if ($rez) {
        http_response_code(409);
        echo json_encode(["odg"=>"vec ste odgovarali na ovu anketu"]);
    }
    else {
        $upit = "INSERT INTO anketa_korisnik (idKorisnik, idOdgovor, odgovoreno) VALUES ($id_korisnika, $idOdgovora,1);";
        $upit2= "UPDATE odgovor SET brGlasova = brGlasova+1 WHERE id=$idOdgovora;";
        try {
            $rez2=$konekcija->exec($upit2);
            $rez = $konekcija->exec($upit);
            if ($rez) {
                http_response_code(201);
                echo json_encode(["odg" => "Thank you for your cooperation"]);
            }
			
			
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
else{
    http_response_code(404);
    echo json_encode(["odg"=>"error 404"]);
}

