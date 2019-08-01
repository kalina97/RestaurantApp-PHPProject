<?php
session_start();
ob_start();
require "konekcija.php";
if (isset($_POST["send"])) {
    $podaci = $_POST["podaci"];
    $zanimanje = $_POST["zanimanje"];
    $errors=[];
    $rePodaci="/^[A-Z][a-z]{2,9}(\s[A-Z][a-z]{2,9})+$/";
    $reZan="/^[A-Z][a-z]{2,9}$/";
    $pic=$_FILES["slika"];
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

    if(!$zanimanje) {
        array_push($errors, "Polje za zanimanje je obavezno.");
    } elseif(!preg_match($reZan, $zanimanje)) {
        array_push($errors, "Polje za zanimanje nije dobrog formata.");
    }

    if(!$podaci) {
        array_push($errors, "Polje za zanimanje je obavezno.");
    } elseif(!preg_match($rePodaci, $podaci)) {
        array_push($errors, "Polje za zanimanje nije dobrog formata.");
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


            $upit55 = "INSERT INTO osoblje(slika,tekst,naslov,idRestoran) VALUES (:slika,:tekst,:naslov,1)";
            $priprema = $konekcija->prepare($upit55);
            $priprema->bindParam(":slika", $path);
            $priprema->bindParam(":tekst", $zanimanje);
            $priprema->bindParam(":naslov", $podaci);

            $rez33 = $priprema->execute();
            //http_response_code(201);
                header("Location: ../index.php?page=about");


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

