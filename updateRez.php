<?php
include "views/head.php";
include "views/nav.php";
include "views/slider.php";
include "modules/konekcija.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $upit = "SELECT * FROM rezervacija_stola WHERE idRez = :id";
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
    <div class="container">
        <div class="row no-gutters justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 id="pomerr">Update reservation</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-4 ftco-animate img" style="background-image: url(images/bg_1.jpg);"></div>
            <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                <form action="modules/editRez.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="imence" id="ime1" value="<?=$rezultat->ime?>" class="form-control" placeholder="Your Name">
                            </div>
                            <p id="eror1"></p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="emaili" id="mail" value="<?=$rezultat->email?>" class="form-control" placeholder="Your Email">
                            </div>
                            <p id="erorMail"></p>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" name="datums" class="form-control" value="<?=$rezultat->datum?>" id="book_date" placeholder="Date">
                            </div>
                            <p id="erorD"></p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="text" name="times" class="form-control" value="<?=$rezultat->vreme?>" id="book_time" placeholder="Time">
                            </div>
                            <p id="erorV"></p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Guests</label>
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="gosti" id="gosti" value="<?=$rezultat->brGostiju?>" class="form-control">
                                        <option value="0">Choose</option>
                                        <?php
                                        include "modules/konekcija.php";
                                        $upit21="SELECT * FROM gosti;";
                                        $rezultati=$konekcija->query($upit21)->fetchAll();

                                        foreach ($rezultati as $red):?>
                                        <option value="<?=$red->idGost?>"><?=$red->brojGostiju?></option>

                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <p id="erorGS"></p>
                        </div>

                        <input type="hidden" name="skriveno" value="<?= $rezultat->idRez ?>"/>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <button type="submit"  name="izmenires" value="Make a Reservation" class="btn btn-primary py-3 px-5">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="poruka4"></div>
            </div>
        </div>
    </div>
</section>















<?php

include "views/photos.php";
include "views/footer.php";

?>
