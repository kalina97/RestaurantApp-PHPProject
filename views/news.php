<?php


if(isset($_SESSION['korisnik'])):


?>

<?php
include "modules/konekcija.php";


if(isset($_GET['id'])):

    $idVesti=$_GET['id'];
    $upit="SELECT slikaVest,naslovVest,tekst,datum FROM vesti WHERE idVest=$idVesti;";
    $red=$konekcija->query($upit)->fetch();



?>


<?php if($red):?>
<section class="ftco-section bg-light">
    <div class="container">

<div id="tamo" class="col-md-6 col-lg-6">


    <div class="blog-entry">
        <a href="<?=$red->slikaVest?>" data-lightbox="gallery" class="block-20" style="background-image: url(<?=$red->slikaVest?>);">
        </a>
        <div class="text p-4">
            <h3 class="heading"><?=$red->naslovVest?></h3>
            <p class="clearfix"><?=$red->tekst?></p>
            <h5>Posted by: Admin &nbsp;&nbsp;|&nbsp;&nbsp; Date: <?=$red->datum?></h5>

        </div>
    </div>

</div>
    </div>
</section>
<?php endif;?>

<?php endif;?>

<div id="nensi" class="col-md-6">
    <h2 id="naslov" class="mb-5">Leave a Comment</h2>
<form method="post">


    <div class="row">
        <div class="col-md-8 form-group">
            <label for="">Date</label>
            <input type="date" name="datumjoj" id="jojdat" class="form-control"  placeholder="Date">
        </div>

    </div>
    <p id="erordatum"></p>
    <div class="row">
        <div class="col-md-8 form-group">
            <label for="name">Comment</label>
            <textarea name="comment1" id="comment1" cols="30" rows="7" class="form-control" ></textarea>
        </div>


    </div>
    <p id="erorC"></p>

    <div class="row">
        <div class="col-md-8 form-group">
            <button type="button" data-id="<?=$idVesti?>"  value="Comment" id="dugme225" class="btn btn-primary py-3 px-5">Add Comment</button>
        </div>
    </div>




</form>

    <div id="poruka5"></div>
</div>

       <div id="prikaz">

           <div id="prikazi">


           </div>

        <div id="row1">
            <h2 id="naslov8889" class="mb-5">Last Comments To This News</h2>
            <?php

            include "modules/konekcija.php";

            if(isset($_GET['id'])):

                $idVesti=$_GET['id'];
                $upit56="SELECT * FROM vesti v INNER join komentari k on v.idVest=k.idVest WHERE k.idVest=$idVesti ORDER BY k.idKomentar DESC";
                $rezultat=$konekcija->query($upit56)->fetchAll();
                foreach ($rezultat as $red) :?>

                    <h3 class="pozadi">By: <?=$red->imeKorisnika ?>   |  <?=$red->datumKom ?> | <span class="icon-chat"></span></h3>

                    <div class="komentic">
                        <textarea id="oblast" rows="3" cols="76" disabled="true"><?=$red->komentar?></textarea>
                    </div>


                <?php endforeach; ?>

            <?php endif;?>



        </div>



       </div>









<?php endif;?>