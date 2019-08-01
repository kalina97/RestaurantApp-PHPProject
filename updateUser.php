<?php
include "views/head.php";
include "views/nav.php";
include "views/slider.php";
include "modules/konekcija.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $upit = "SELECT k.*,u.id as ulogaID,u.naziv FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id WHERE k.id = $id";
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


<section class="site-section">
    <div class="container1">
        <div class="row">
            <div class="col-md-6">
                <h2 id="naslov" class="mb-5">Update User</h2>
                <form action="modules/edited.php" method="POST">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">First Name</label>
                            <input type="text" name="firstName" value="<?=$rezultat->ime?>" id="ime33" class="form-control ">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="phone">Last Name</label>
                            <input type="text" name="lastName" value="<?=$rezultat->prezime?>" id="prezime" class="form-control ">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?=$rezultat->email?>" id="email33" class="form-control ">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="user">Username</label>
                            <input type="text" name="username" value="<?=$rezultat->korisnicko_ime?>" id="username" class="form-control ">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="password">Role</label>
                            <input type="text" name="uloga" value="<?=$rezultat->uloga_id?>" id="password333" class="form-control ">
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="password">Active Yes/No</label>
                            <input type="checkbox" name="aktivan" value="aktivan" id="aktivan" class="form-control"<?=($rezultat->aktivan==1)?"checked":""?>/>
                        </div>

                    </div>



                    <input type="hidden" name="skriveno" value="<?= $rezultat->id ?>"/>



                    <div class="row">
                        <div class="col-md-6 form-group">
                            <button type="submit"  name="izmeni" value="Register" id="dugme" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

                <div id="poruka1"></div>
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>
</section>
<!-- END section -->














<?php


include "views/photos.php";
include "views/footer.php";
?>
