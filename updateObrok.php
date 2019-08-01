<?php
include "views/head.php";
include "views/nav.php";
include "views/slider.php";
include "modules/konekcija.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $upit = "SELECT * FROM obrok WHERE idObrok = :id";
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



    <section  class="ftco-section">
        <div id="prijem" class="container">
            <div class="row no-gutters justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 id="pomerra">Update Meal</h2>
                </div>
            </div>
            <div class="row d-flex">

                <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                    <form action="modules/editObrok.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Meal Name</label>
                                    <input type="text" name="meal" value="<?=$rezultat->naziv?>" id="meal" class="form-control" placeholder="Meal Name">
                                </div>
                                <p id="erorDl1"></p>
                            </div>

                            <input type="hidden" name="skrivenob" value="<?= $rezultat->idObrok ?>"/>


                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <button type="submit"  name="izmeniobrok" value="Make a Reservation" class="btn btn-primary py-3 px-5">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="poruka454"></div>
                </div>
            </div>
        </div>
    </section>




<?php

include "views/photos.php";
include "views/footer.php";

?>