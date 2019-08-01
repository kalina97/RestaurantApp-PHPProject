<?php
if(isset($_SESSION['korisnik'])):
?>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Our Menu</span>
                <h2 id="naslov">Click On The Links Below And Discover Our Exclusive Menu</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 dish-menu">

                <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link py-3 px-4" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class="flaticon-meat"></span> Breakfast</a>
                    <a class="nav-link py-3 px-4" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span class="flaticon-cutlery"></span> Dessert</a>
                    <a class="nav-link py-3 px-4" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span class="flaticon-cheers"></span> Drinks</a>
                </div>

                <div class="tab-content py-5" id="v-pills-tabContent">






                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row">
                            <div class="col-lg-12">

                                <?php
                                include "modules/konekcija.php";
                                $upit1="SELECT * FROM jelo j INNER JOIN jelo_sastojci js on j.idJelo=js.idJelo INNER JOIN sastojci_za_jelo szj on js.idSastojak=szj.idSastojak INNER JOIN cena_jela cj on j.idCenaJela=cj.idCenaJela";



                                $rezultat1=$konekcija->query($upit1);
                                $konacno1=$rezultat1->fetchAll();
                                foreach ($konacno1 as $red1):


                                    ?>

                                    <div class="menus d-flex ftco-animate">
                                        <div class="menu-img" style="background-image: url(<?=$red1->slika?>);"></div>
                                        <div class="text d-flex">
                                            <div class="one-half">
                                                <h3><?=$red1->naziv?></h3>
                                                <p><span>Ingredients: <?=$red1->nazivSa?></span></p>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">Price: <?=$red1->vrednost?>$</span>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>


                        </div>
                    </div><!-- END -->




                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row">
                            <div class="col-lg-12">

                                <?php
                                include "modules/konekcija.php";
                                $upit1="SELECT * FROM desert d INNER JOIN desert_sastojci ds on d.idDesert=ds.idDesert INNER JOIN sastojci_za_desert szd on ds.idSasDe=szd.idSasDe INNER JOIN cena_deserta cds on d.idCenaDes=cds.idCenaDes";



                                $rezultat2=$konekcija->query($upit1);
                                $konacno2=$rezultat2->fetchAll();
                                foreach ($konacno2 as $red2):


                                    ?>

                                    <div class="menus d-flex ftco-animate">
                                        <div class="menu-img" style="background-image: url(<?=$red2->slika?>);"></div>
                                        <div class="text d-flex">
                                            <div class="one-half">
                                                <h3><?=$red2->naziv?></h3>
                                                <p><span>Ingredients: <?=$red2->nazivSD?></span></p>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">Price: <?=$red2->vrednost?>$</span>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>


                        </div>
                    </div><!-- END -->







                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row">
                            <div class="col-lg-12">

                                <?php
                                include "modules/konekcija.php";
                                $upit="SELECT * FROM pice p INNER JOIN pice_sastojci ps on p.idPice=ps.idPice INNER JOIN sastojci_za_pice szp on ps.idSasPice=szp.idSasPice INNER JOIN cena_pica cp on p.idCenaPica=cp.idCenaPica";



                                $rezultat=$konekcija->query($upit);
                                $konacno=$rezultat->fetchAll();
                                foreach ($konacno as $red):


                                    ?>

                                    <div class="menus d-flex ftco-animate">
                                        <div class="menu-img" style="background-image: url(<?=$red->slika?>);"></div>
                                        <div class="text d-flex">
                                            <div class="one-half">
                                                <h3><?=$red->naziv?></h3>
                                                <p><span>Ingredients: <?=$red->nazivS?></span></p>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">Price: <?=$red->vrednost?>$</span>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>


                        </div>
                    </div><!-- END -->






                </div>




            </div>
        </div>
    </div>
    </div>
</section>


<?php endif; ?>

