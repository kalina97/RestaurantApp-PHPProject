<?php
session_start();
ob_start();
require "konekcija.php";
if (isset($_POST["sendi"])) {
    $ime = $_POST["specn"];
    $opis = $_POST["descr"];
    $cena=$_POST["price"];
    $errors=[];
    $reIme="/^[A-z]+(\s[a-z][0-9])*$/";
    $reCena="/^[0-9]{1,5}$/";
    $pic=$_FILES["slikas"];
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

    if(!$ime) {
        array_push($errors, "Polje za ime je obavezno.");
    } elseif(!preg_match($reIme, $ime)) {
        array_push($errors, "Polje za ime nije dobrog formata.");
    }

    if(!$opis) {
        array_push($errors, "Polje za opis je obavezno.");
    } elseif(empty($opis)) {
        array_push($errors, "Polje za opis je obavezno");
    }


    if(!$cena) {
        array_push($errors, "Polje za cenu je obavezno.");
    } elseif(!preg_match($reCena,$cena)) {
        array_push($errors, "Polje za cenu je obavezno");
    }




    if (count($errors)) {
        //http_response_code(422);
        $data=$errors;
        echo json_encode(["Error"=>"You must fill form data! Go back and try again!"]);
    }

    else {

        try{
            $fileName = time().$picName;
            //var_dump($tmp);
            $path ="images/".$fileName;
            if(move_uploaded_file($tmp, "../".$path)) {


                $upit55 = "INSERT INTO specijaliteti(naziv,opis,slika,cena,idRestoran) VALUES (:naziv,:opis,:slika,:cena,1)";
                $priprema = $konekcija->prepare($upit55);
                $priprema->bindParam(":slika", $path);
                $priprema->bindParam(":naziv", $ime);
                $priprema->bindParam(":opis", $opis);
                $priprema->bindParam(":cena", $cena);

                $rez33 = $priprema->execute();
                //http_response_code(201);
                header("Location: ../index.php?page=specialities");


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
echo json_encode($data);
