<?php
include "views/head.php";
include "views/nav.php";
include "views/slider.php";
include "modules/konekcija.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $upit = "SELECT * FROM specijaliteti WHERE idSpec = :id";
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
                    <h2 id="pomerra">Update Speciality</h2>
                </div>
            </div>
            <div class="row d-flex">

                <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                    <form action="modules/editSpec.php" enctype="multipart/form-data" method="post">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" value="<?=$rezultat->naziv?>" name="specn1" id="specn" class="form-control" placeholder="Name">
                                </div>
                                <p id="erorspn"></p>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" value="<?=$rezultat->opis?>" name="descr1" class="form-control" id="descr" placeholder="Description">
                                </div>
                                <p id="erordes"></p>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Picture</label>
                                    <input type="file"  name="slikas1" id="slikas" class="form-control"/><h5>Current picture: <?=$rezultat->slika?></h5>

                                </div>
                                <p id="erorpics"></p>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="price1" value="<?=$rezultat->cena?>" class="form-control" id="price" placeholder="Price">
                                </div>
                                <p id="erorpri"></p>
                            </div>

                            <input type="hidden" name="skrivenosp1" value="<?= $rezultat->idSpec ?>"/>

                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <button type="submit" name="sendi1" id="buton335" value="Make a Reservation" class="btn btn-primary py-3 px-5">Update</button>
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