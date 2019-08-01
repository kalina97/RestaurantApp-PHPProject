<?php

if(isset($_POST['izmenianketu'])){
    include "konekcija.php";
    $id = $_POST['skrivenoank'];
    $pitanje=$_POST['ankpi'];

    $errors=[];




    if (strlen($pitanje) == 0) {
        $errors[] = "Morate uneti pitanje";
    }

    if(count($errors)) {
        $code = 422;
        $data = $errors;
    }

    else{
        try{

            $upit = "UPDATE anketa SET pitanje=:pitanje WHERE id=:id";
            $prepare=$konekcija->prepare($upit);
            $prepare->bindParam(":pitanje", $pitanje);
            $prepare->bindParam(":id", $id);


            $uspesno=$prepare->execute();

            header("Location: ../index.php?page=about");

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }

}

echo json_encode($data);