<?php


if(isset($_SESSION['korisnik'])):


?>
<section class="ftco-section bg-light">
    <div class="container">
        <h2 class="ajde"> Our Restaurant News</h2>

        <div class="row">


            <?php
            include "modules/konekcija.php";

           // $upit="SELECT * FROM vesti";
            //$rezultat=$konekcija->query($upit);

            $upit2="SELECT COUNT(*) as br FROM vesti;";
            $obj=$konekcija->query($upit2)->fetch();

            $poStrani=3;
            $links=ceil($obj->br/$poStrani);
            //echo $links;
            $page=isset($_GET['str'])? $_GET['str']:1;


            $odakle=$poStrani*($page-1);


            $rez=$konekcija->query($upit2)->fetchAll();

            $upit3="select * from vesti LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit3)->fetchAll();
            //$upit4="select * from vesti v inner join komentari k on v.idVest=k.idVest;";
            //$priprema=$konekcija->query($upit4)->fetchAll();


             if($priprema):?>





           <?php foreach ($priprema as $red):?>


                     <div class="col-md-6 col-lg-4 ftco-animate">


                <div class="blog-entry">
                    <a href="<?=$red->slikaVest?>" data-lightbox="gallery" class="block-20" style="background-image: url(<?=$red->slikaVest?>);">
                    </a>
                    <div class="text p-4">
                        <div class="meta">
                            <div><h5>Date: <?=$red->datum?></h5></div>

                        </div>
                        <h3 class="heading"><?=$red->naslovVest?></h3>
                        <p class="clearfix">
<a id="link" data-id="<?=$red->idVest?>" href="index.php?page=news&id=<?=$red->idVest?>" class="float-left read">Read more</a>

                        </p>
                    </div>
                </div>

                     </div>

            <?php endforeach;?>


           <?php endif;?>

        </div>

        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                        <li><a href="index.php?page=blog&str=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<?php endif;?>