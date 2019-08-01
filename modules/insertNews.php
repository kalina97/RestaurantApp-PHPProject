<?php
session_start();
ob_start();
require "konekcija.php";
if (isset($_POST["sending"])) {
    $datum = $_POST["datumv"];
    $naslov = $_POST["naslovv"];
    $tekst=$_POST["tekstv"];
    $errors=[];
    //$reIme="/^[a-z]+(\s[a-z][0-9])*$/";
    $pic=$_FILES["slikav"];
    $tmp = $pic["tmp_name"];
    $picName = $pic["name"];
    $picSize = $pic["size"];
    $picType = $pic["type"];
    $formati = array("image/jpg", "image/jpeg", "image/png", "image/gif");
    if(!in_array($picType, $formati)){
        $errors[] = "Tip fajla nije ok.";
    }
    if($picSize > 3000000){
        $errors[] = "Fajl mora biti manji od 3MB.";
    }

    if(!$datum) {
        array_push($errors, "Polje za datum objave je obavezno.");
    } elseif(empty($datum)) {
        array_push($errors, "Polje za datum objave je obavezno");
    }
    if(!$naslov) {
        array_push($errors, "Polje za naslov je obavezno.");
    } elseif(empty($naslov)) {
        array_push($errors, "Polje za naslov je obavezno");
    }


    if(!$tekst) {
        array_push($errors, "Polje za opis vesti je obavezno.");
    } elseif(empty($tekst)) {
        array_push($errors, "Polje za opis vesti je obavezno");
    }




    if (count($errors)) {
        //http_response_code(422);
        //$data=$errors;
        echo json_encode(["Error"=>"You must fill form data! Go back and try again!"]);
    }

    else {

        try{
            $fileName = time().$picName;
            //var_dump($tmp);
            $path ="images/".$fileName;
            if(move_uploaded_file($tmp, "../".$path)) {


                $upit55 = "INSERT INTO vesti(slikaVest,datum,naslovVest,tekst,idRestoran) VALUES (:slika,:datum,:naslov,:tekst,1)";
                $priprema = $konekcija->prepare($upit55);
                $priprema->bindParam(":slika", $path);
                $priprema->bindParam(":datum", $datum);
                $priprema->bindParam(":naslov", $naslov);
                $priprema->bindParam(":tekst", $tekst);

                $rez33 = $priprema->execute();
                //http_response_code(201);
                header("Location: ../index.php?page=blog");


            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}
else{
    //http_response_code(404);
    echo json_encode(["Error"=>"Page not found"]);
}

