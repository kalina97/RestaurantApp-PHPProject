<?php
session_start();
header("Content-type: application/json");
include "konekcija.php";
if (isset($_POST["send"])) {

    //var_dump($_POST);
    //die();
    $komentar = $_POST["comment"];
    $idVesti = $_POST["id"];
    $datum=$_POST['datum'];
    $imeKorisnika = $_SESSION["korisnik"]->ime;
    //echo '<h1>Uspesna konekcijaaaaa</h1>';
    //die();
    //http_response_code(204);
    //var_dump($_POST);
     $errors=[];

    if (strlen($komentar) == 0) {
        $errors[] = "morate uneti komentar";
    }

    if(!$datum) {
        array_push($errors, "Polje za datum objave je obavezno.");
    } elseif(empty($datum)) {
        array_push($errors, "Polje za datum objave je obavezno");
    }

    if (count($errors)) {
        //http_response_code(422);
    }

    else {


        $upit55 = "INSERT INTO komentari(idKomentar,imeKorisnika,komentar,datumKom,idVest) VALUES (null,:ime,:komentar,:dat,:idVesti)";
        $priprema = $konekcija->prepare($upit55);
        $priprema->bindParam(":ime", $imeKorisnika);
        $priprema->bindParam(":komentar", $komentar);
        $priprema->bindParam(":dat", $datum);
        $priprema->bindParam(":idVesti", $idVesti);


        try{

            $rez33 = $priprema->execute();
            //echo json_encode(["uspeh"=>"Uneto"]);
            if($rez33) {

                $upitNovi = "SELECT * FROM vesti v INNER join komentari k on v.idVest=k.idVest order by k.idKomentar desc limit 1";
                $red = $konekcija->query($upitNovi);
                $rezNovi = $red->fetch(PDO::FETCH_OBJ);
                //var_dump($rezNovi);

                $ime = $rezNovi->imeKorisnika;
                $datumNeki = $rezNovi->datumKom;
                $komentar1 = $rezNovi->komentar;


                $data = array(
                    "ime" => $ime,
                    "datum" => $datumNeki,
                    "komentar" => $komentar1

                );

            }




        } catch (PDOException $e) {
          echo $e->getMessage();
            //http_response_code(500);
        }

    }

    echo json_encode($data);

}
