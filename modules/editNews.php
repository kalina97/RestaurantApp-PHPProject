<?php
//$data=null;
if(isset($_POST['sending'])){
    include "konekcija.php";
    $id = $_POST['skrivenove'];
    $datum=$_POST['datumv'];
    $naslov=$_POST['naslovv'];
    $errors=[];
    $tekst=$_POST['tekstv'];
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
        array_push($errors, "Polje za datum je obavezno.");
    } elseif(empty($datum)) {
        array_push($errors, "Morate uneti datum objave vesti");
    }


    if(!$naslov) {
        array_push($errors, "Polje za naslov je obavezno.");
    } elseif(empty($naslov)) {
        array_push($errors, "Morate uneti naslov vesti");
    }

    if(!$tekst) {
        array_push($errors, "Polje za opis vesti je obavezno.");
    } elseif(empty($tekst)) {
        array_push($errors, "Morate uneti opis vesti");
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

                $upit = "UPDATE vesti SET slikaVest=:slika,datum=:dat,naslovVest=:naslov,tekst=:txt WHERE idVest=:id";
                $prepare = $konekcija->prepare($upit);
                $prepare->bindParam(":dat", $datum);
                $prepare->bindParam(":naslov", $naslov);
                $prepare->bindParam(":slika", $path);
                $prepare->bindParam(":txt", $tekst);
                $prepare->bindParam(":id", $id);

                //$code=201;
                $uspesno = $prepare->execute();

                header("Location: ../index.php?page=blog");

            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }


}
//http_response_code($code);
echo json_encode($data);
