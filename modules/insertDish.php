<?php
session_start();
ob_start();
require "konekcija.php";
if (isset($_POST["sendjelo"])) {
    $ime = $_POST["jelon"];
    $sastojci = $_POST["jelosas"];
    $cena=$_POST["jeloc"];
    $errors=[];
    $reCena="/^[0-9]{1,5}$/";
    $pic=$_FILES["slikaj"];
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
        array_push($errors, "Polje za ime jela je obavezno.");
    } elseif(empty($ime)) {
        array_push($errors, "Polje za ime jela nije dobrog formata.");
    }

    if(!$sastojci) {
        array_push($errors, "Polje za sastojke jela je obavezno.");
    } elseif(empty($sastojci)) {
        array_push($errors, "Polje za sastojke jela nije dobrog formata.");
    }



    if(!$cena) {
        array_push($errors, "Polje za cenu jela je obavezno.");
    } elseif(!preg_match($reCena,$cena)) {
        array_push($errors, "Polje za cenu jela je obavezno");
    }




    if (count($errors)) {
        //http_response_code(422);

        echo json_encode(["Error"=>"You must fill form data! Go back and try again!"]);
    }

    else {

        try{
            $fileName = time().$picName;
            //var_dump($tmp);
            $path ="images/".$fileName;
            if(move_uploaded_file($tmp, "../".$path)) {





                $upit56 = "INSERT INTO cena_jela(vrednost) VALUES (:vrednost)";
                $priprema1 = $konekcija->prepare($upit56);
                $priprema1->bindParam(":vrednost", $cena);
                $rez44=$priprema1->execute();

                if($rez44){
                    $idcene=$konekcija->lastInsertId();
                }


                $upit57 = "INSERT INTO sastojci_za_jelo(nazivSa) VALUES (:naziv)";
                $priprema2 = $konekcija->prepare($upit57);
                $priprema2->bindParam(":naziv", $sastojci);
                $rez66=$priprema2->execute();

                if($rez66){
                    $idSas=$konekcija->lastInsertId();
                }

                $upit55 = "INSERT INTO jelo(naziv,slika,idObrok,idCenaJela) VALUES (:naziv,:slika,1,$idcene)";
                $priprema = $konekcija->prepare($upit55);
                $priprema->bindParam(":slika", $path);
                $priprema->bindParam(":naziv", $ime);
                $rez33 = $priprema->execute();

                if($rez33){
                    $idJela=$konekcija->lastInsertId();
                }



                $upit58 = "INSERT INTO jelo_sastojci(idJelo,idSastojak) VALUES ($idJela,$idSas)";
                $priprema3 = $konekcija->prepare($upit58);
                $rez77=$priprema3->execute();

              http_response_code(204);



                //http_response_code(201);
                header("Location: ../index.php?page=menu");


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

