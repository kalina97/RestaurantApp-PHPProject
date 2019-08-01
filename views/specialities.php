<?php


if(isset($_SESSION['korisnik'])):


?>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row no-gutters justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2>Our Specialities</h2>
            </div>
        </div>
        <div class="row d-flex no-gutters">
            <?php
            include "modules/konekcija.php";

            $upit="SELECT * FROM specijaliteti;";
            $rezultat=$konekcija->query($upit);


            foreach ($rezultat as $red):

            ?>

                <div class="col-lg-12">
                <div class="block-3 d-md-flex ftco-animate">
                    <div class="image order-last" style="background-image: url(<?=$red->slika?>);">

                    </div>
                    <div class="text text-center order-first">
                        <h2 class="heading"><?= $red->naziv ?></h2>
                        <p><?= $red->opis ?></p>
                        <span class="price">Price: <?= $red->cena ?>$</span>
                    </div>
                </div>
            </div>

            <?php endforeach;?>

        </div>
    </div>
</section>

<?php endif;?>