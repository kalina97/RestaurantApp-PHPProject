<?php
header("Content-type: application/json");

include "konekcija.php";

$code = 404;
$data = null;

if(isset($_POST['send'])) {


    $putanja = $_POST['putanja'];
    $ime = $_POST['ime'];
    $errors = [];
    $reIme = "/^[A-Z][a-z0-9]+$/";


    if(!$putanja) {
        array_push($errors, "Polje za putanju je obavezno.");
    } elseif(empty($putanja)) {
        array_push($errors, "Polje za putanju je obavezno");
    }


    if(!$ime) {
        array_push($errors, "Polje za ime je obavezno.");
    } elseif(!preg_match($reIme, $ime)) {
        array_push($errors, "Polje za ime nije dobrog formata.");
    }






    if(count($errors)) {
        $code = 422;
        $data = $errors;
    } else {
        try{

            $upit = "INSERT into linkovi (imeLinka,putanja,roditelj)
          values (:ime,:putanja,0)";
            $statement = $konekcija->prepare($upit);
            $statement->bindParam(":ime", $ime);
            $statement->bindParam(":putanja", $putanja);
            //$statement->bindParam(":roditelj", $broj);

            $rez=$statement->execute();
            // insert u bazu
            $code =201;


        } catch(PDOException $e) {
            $code = 409;
            $data = $e->getMessage();
        }
    }


}
http_response_code($code);

echo json_encode($data);
