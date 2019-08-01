<?php


if(isset($_SESSION['korisnik'])):


?>
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 id="pomerr">Reserve a table</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-4 ftco-animate img" style="background-image: url(images/bg_1.jpg);"></div>
            <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                <form action="#">
                    <div class="row">
                        <!--<div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" id="ime1" class="form-control" placeholder="Your Name">
                            </div>
                            <p id="eror1"></p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" id="mail" class="form-control" placeholder="Your Email">
                            </div>
                            <p id="erorMail"></p>
                        </div>-->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" class="form-control" id="book_date" placeholder="Date"><br/>
                            </div>
                            <p id="erorD"></p>
                        </div><br/>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="text" class="form-control" id="book_time" placeholder="Time"><br/>
                            </div>
                            <p id="erorV"></p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Guests</label>
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="gosti" id="gosti" class="form-control">
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
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <button type="button" id="but" value="Make a Reservation" class="btn btn-primary py-3 px-5">Reserve</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="poruka4"></div>
            </div>
        </div>
    </div>
</section>

<?php endif;?>