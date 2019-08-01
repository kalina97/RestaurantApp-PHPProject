<?php
//$data=null;
if(isset($_POST['sendi1'])){
    include "konekcija.php";
    $id = $_POST['skrivenosp1'];
    $ime=$_POST['specn1'];
    $opis=$_POST['descr1'];
    $errors=[];
    $reIme="/^[A-z]+(\s[a-z][0-9])*$/";
    $reCena="/^[0-9]{1,5}$/";
    $cena=$_POST['price1'];
    $pic=$_FILES["slikas1"];
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
        array_push($errors, "Los format za ime.");
    }

    if(!$opis) {
        array_push($errors, "Polje za opis je obavezno.");
    } elseif(empty($opis)) {
        array_push($errors, "Morate uneti opis");
    }


    if(!$cena) {
        array_push($errors, "Polje za cenu je obavezno.");
    } elseif(!preg_match($reCena,$cena)) {
        array_push($errors, "Morate uneti cenu kao broj");
    }
     //$code=204;



    if(count($errors)) {
        $code = 422;
        $data = $errors;
    }

    else{
        try {

            $fileName = time() . $picName;
            //var_dump($tmp);
            $path = "images/" . $fileName;
            if (move_uploaded_file($tmp, "../" . $path)) {

                $upit = "UPDATE specijaliteti SET naziv=:ime,opis=:opis,slika=:slika,cena=:cena WHERE idSpec=:id";
                $prepare = $konekcija->prepare($upit);
                $prepare->bindParam(":ime", $ime);
                $prepare->bindParam(":opis", $opis);
                $prepare->bindParam(":slika", $path);
                $prepare->bindParam(":cena", $cena);
                $prepare->bindParam(":id", $id);

                 //$code=201;
                $uspesno = $prepare->execute();


                header("Location: ../index.php?page=specialities");

            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }


}
//http_response_code($code);
echo json_encode($data);
