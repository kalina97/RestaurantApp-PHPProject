<?php
session_start();
ob_start();
header("Content-type: application/json");
include "konekcija.php";


if(isset($_POST['send'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $regMail = "/^[a-z][A-z\.\-0-9]{4,35}\@[a-z]{2,5}(\.[a-z]{2,5}){1,3}$/";
    $regLozinka ="/^([A-Za-z\d]){8,}$/";
    $errors = [];
    if (!preg_match($regMail, $email)) {
        $errors[] = "Email is not ok";
    }

    if (!preg_match($regLozinka, $password)) {
        $errors[] = "Password is not ok";
    }


    if (count($errors) > 0) {
        http_response_code(422);
        echo json_encode(["eror"=>"422"]);

    }
    else {

        // upit ka bazi
        $upit = "SELECT k.*, u.naziv FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id WHERE email = :email AND lozinka= :password AND aktivan = 1";

        $priprema = $konekcija->prepare($upit);

        $priprema->bindParam(":email", $email);

        $priprema->bindParam(":password", $password);

        try {
            $priprema->execute();

            if ($priprema->rowCount() == 1) {
                //echo "<h2>Postoji korisnik u bazi !</h2>";

                $korisnik = $priprema->fetch(); // tacno 1 red

                $_SESSION['korisnik'] = $korisnik;

                if (isset($_SESSION['korisnik'])) {
                    if ($_SESSION['korisnik']->naziv == "admin") {
                        //var_dump($korisnik);
                        //var_dump($_SESSION['korisnik']);
                        http_response_code(201);
                        echo json_encode(["lokacija"=>"admin.php"]);

                    } else {
                        http_response_code(201);
                        echo json_encode(["lokacija"=>"index.php?page=menu"]);

                    }

                } else {

                    http_response_code(422);
                    echo json_encode(["lokacija"=>"index.php?page=home"]);
                }


            } else {
                http_response_code(422);

                echo json_encode(["eror"=>"422"]);
            }
        }

        catch (PDOException $x) {
            echo $x->getMessage();
        }

    }
}

else{

   echo json_encode(["eror"=>"404"]);
   http_response_code(404);
}
