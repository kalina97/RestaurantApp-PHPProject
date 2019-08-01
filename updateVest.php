<?php
include "views/head.php";
include "views/nav.php";
include "views/slider.php";
include "modules/konekcija.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $upit = "SELECT * FROM vesti WHERE idVest = :id";
    $prepare = $konekcija->prepare($upit);
    $prepare->bindParam(":id", $id);
    try{
        $prepare->execute();
        $rezultat = $prepare->fetch();
    }catch(PDOExeption $e){
        echo $e->getMessage();
    }

}


?>



    <section class="ftco-section">
        <div id="prijem" class="container">
            <div class="row no-gutters justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 id="pomerra">Update News</h2>
                </div>
            </div>
            <div class="row d-flex">

                <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                    <form action="modules/editNews.php" enctype="multipart/form-data" method="post">
                        <div class="row">


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Picture</label>
                                    <input type="file" name="slikav" id="slikav" class="form-control"><h5>Current picture: <?=$rezultat->slikaVest?></h5>
                                </div>
                                <p id="erorpics"></p>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" name="datumv" value="<?=$rezultat->datum?>" class="form-control" id="datumv" placeholder="Date">
                                </div>
                                <p id="erorspn"></p>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Caption</label>
                                    <input type="text" name="naslovv" value="<?=$rezultat->naslovVest?>" class="form-control" id="naslovv" placeholder="Caption">
                                </div>
                                <p id="erordes"></p>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" name="tekstv" class="form-control" value="<?=$rezultat->tekst?>" id="tekstv" placeholder="Description">
                                </div>
                                <p id="erorpri"></p>
                            </div>

                            <input type="hidden" name="skrivenove" value="<?= $rezultat->idVest ?>"/>

                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <button type="submit" name="sending" id="buton335" value="Make a Reservation" class="btn btn-primary py-3 px-5">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="poruka4553"></div>
                </div>
            </div>
        </div>
    </section>












<?php

include "views/photos.php";
include "views/footer.php";

?>