<?php


if(isset($_SESSION['korisnik'])):


?>
<section class="ftco-section-2">
    <div class="container d-flex">
        <div class="section-2-blocks-wrapper row">
            <div class="img col-sm-12 col-lg-6" style="background-image: url('images/about-2.jpg');">
            </div>
            <div class="text col-lg-6 ftco-animate">
                <div class="text-inner align-self-start">
                    <span class="subheading">About Tasty</span>
                    <h3 class="heading">Our chef cooks the most delicious food for you</h3>
                    <p>This is Thomas Smith and he is our Head Chef. He is the leader among the chefs in the kitchen. </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2>Our Staff</h2>
            </div>
        </div>
        <div class="row">
            <?php
            include "modules/konekcija.php";

            $upit="SELECT * FROM osoblje;";
            $rezultat=$konekcija->query($upit);

            foreach ($rezultat as $red):?>

            <div class="col-md-4 ftco-animate">
                <div class="block-10">
                    <div class="person-info">
                        <span class="name"><?= $red->naslov?></span>
                        <span class="position"><?=$red->tekst?></span>
                    </div>
                    <div class="chef-img" style="background-image: url(<?=$red->slika?>)">
                    </div>
                </div>
            </div>

            <?php endforeach;?>


        </div>
    </div>
</div>


<div id="row">


    <?php
    include "modules/konekcija.php";
    $upit1 = "SELECT * FROM anketa";
    $item = $konekcija->query($upit1)->fetchAll();
    $upit2 = "SELECT * FROM odgovor";
    $odg = $konekcija->query($upit2)->fetchAll();

    ?>




        <?php foreach($item as $i):?>

            <h3 class="joj"><?=$i->pitanje?></h3>
    <div class="rate-holder">
            <form action="modules/anketa.php"  method="post">



                <?php foreach ($odg as $o):?>

                <?php if($i->id == $o->idAnkete):?>

                <div class="comment">

            <input type="radio"  name="radio<?=$i->id?>"
                   id="radio1" value="<?=$o->id?>">
            <label class="radio1" for="radio1"><?=$o->odgovor?></label>

                </div>
                    <?php endif;?>

                <?php endforeach;?>



        <input type="submit"  name="anketa" data-id="<?=$i->id?>" id="vote"
                value="Vote" class="btn btn-primary py-3 px-5"/>

            </form>
            <div class="probaj" id="poruka<?=$i->id?>"></div>

    </div>



            <div id="rezultanketa">
			
			 
				<table id="tabela">

                    <tr><th colspan="2">Poll Results</th></tr>
                    <tr><th class="kidam1">Answer</th><th class="kidam">Votes</th></tr>

                   
				   
				   <?php
                                     
				   include "modules/konekcija.php";
                    $upit="SELECT * FROM odgovor;";
                    $rez=$konekcija->query($upit);
                    $rez1=$rez->fetchAll();

                    foreach ($rez1 as $red):
                        ?>

                        <tr><td><?=$red->odgovor?></td><td><?=$red->brGlasova?> votes</td></tr>

                    
                    <?php endforeach;?>
                   
                    


                
                </table>
				

               
            </div>
        
		<?php endforeach;?>








</div>

<?php endif;?>