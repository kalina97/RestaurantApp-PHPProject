<?php
session_start();
header("Content-type: application/json");
include("konekcija.php");

if(isset($_POST['send'])) {

    $odgovor = $_POST['odgovor'];
    $pitanje = $_POST['pitanje'];
    $reOdg="/^[A-Z][a-z0-9\s]+$/";
    $errors=[];
    if(isset($_POST['pitanje']) && $_POST['pitanje'] == "") {
        array_push($errors, "Izaberite pitanje");
    }

    if(!$odgovor) {
        array_push($errors, "Polje za odgovor je obavezno.");
    } elseif(!preg_match($reOdg, $odgovor)) {
        array_push($errors, "Polje za odgovor nije dobrog formata.");
    }



    if(count($errors)){
      //$data=$errors;
      http_response_code(422);
    }



    else {


        try {
            $upit = "INSERT INTO odgovor (odgovor,idAnkete) VALUES (:odgovor,:id_ankete)";
            $prepare = $konekcija->prepare($upit);
            $prepare->bindParam(":odgovor", $odgovor);
            $prepare->bindParam(":id_ankete", $pitanje);
            $rez = $prepare->execute();
            http_response_code(201);
            echo json_encode(["Answer"=>"Super"]);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
else{
    http_response_code(404);
    echo json_encode(["Error"=>"Page not found"]);
}

