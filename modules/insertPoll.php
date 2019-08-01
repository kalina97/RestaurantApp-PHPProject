<?php
session_start();
header("Content-type: application/json");

require "konekcija.php";
if (isset($_POST["send"])) {
    $pitanje = $_POST["pitanje"];
    http_response_code(204);
    //var_dump($_POST);
    $rePit="/^[A-Z][\sa-z0-9]+$/";
    $errors=[];

    if(!$pitanje) {
        array_push($errors, "Polje za pitanje je obavezno.");
    } elseif(!preg_match($rePit, $pitanje)) {
        array_push($errors, "Polje za pitanje nije dobrog formata.");
    }



    if (count($errors)) {
        http_response_code(422);
        $data=$errors;
    }

    else {

        try {
            $upit55 = "INSERT INTO anketa(pitanje) VALUES (:pitanje)";
            $priprema = $konekcija->prepare($upit55);
            $priprema->bindParam(":pitanje", $pitanje);

            $rez33 = $priprema->execute();
            //http_response_code(201);

            //header("Location: ../admin.php");
            echo json_encode(["odg" => "You inserted a question"]);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}
else{
    http_response_code(404);
    echo json_encode(["Error"=>"Page not found"]);
}

echo json_encode($data);