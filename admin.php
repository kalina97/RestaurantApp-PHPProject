<?php
session_start();
include "modules/konekcija.php";
include "views/head.php";
include "views/nav.php";
include "views/slider.php";
if(isset($_SESSION['korisnik'])):
    if($_SESSION['korisnik']->naziv == "admin"):?>


        <h1 class="naslov22">Admin Panel</h1>

        <h3 class="naslov228">Upravljanje korisnicima</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id korisnika</td>
                <td>Ime</td>
                <td>Prezime</td>
                <td>Email</td>
                <td>Lozinka</td>
                <td>Aktivan</td>
                <td>Datum registracije</td>
                <td>Id uloge</td>
                <td>Korisnicko ime</td>
                <td>Token</td>

            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from korisnik;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from korisnik LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();

            if($priprema){
                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>" .$red->id."</td><td>".$red->ime."</td><td>".$red->prezime."</td><td>".$red->email."</td><td>".$red->lozinka."</td><td>".$red->aktivan."</td><td>".$red->datum_registracije."</td><td>".$red->uloga_id."</td><td>".$red->korisnicko_ime."</td><td>".$red->token."</td><td><button class='btn btn-primary'><a href='updateUser.php?id=".$red->id ."' class='btnu'>Izmeni</a></button>"."</td><td><button data-id='". $red->id ."' class='btnuser'>Obriši</button></td></tr>";

                }

                echo "</tbody>";


            }



            ?>

        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>




        <section class="site-section">
            <div class="container1">
                <div class="row">
                    <div class="col-md-6">
                        <h2 id="naslov" class="mb-5">Insert User</h2>
                        <form>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="name">First Name</label>
                                    <input type="text" name="firstName" id="ime" class="form-control ">
                                </div>
                                <p id="eror1"></p>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="phone">Last Name</label>
                                    <input type="text" name="lastName" id="prezime" class="form-control ">
                                </div>
                                <p id="eror2"></p>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control ">
                                </div>
                                <p id="erorMail"></p>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="user">Username</label>
                                    <input type="text" name="username" id="username" class="form-control ">
                                </div>
                                <p id="erorUser"></p>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control ">
                                </div>
                                <p id="erorS"></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <button type="button" onclick="provera();" value="Register" id="dugme" class="btn btn-primary py-3 px-5">Insert</button>
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


        <h3 class="naslov228">Upravljanje rezervacijama</h3><br>



        <table id="dataTable">
            <thead>
            <tr>
                <td>Id rezervacije</td>
                <td>Ime</td>
                <td>Email</td>
                <td>Datum</td>
                <td>Vreme</td>
                <td>Broj gostiju</td>


            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from rezervacija_stola;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from rezervacija_stola LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();

            if($priprema){
                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>" .$red->idRez."</td><td>".$red->ime."</td><td>".$red->email."</td><td>".$red->datum."</td><td>".$red->vreme."</td><td>".$red->brGostiju."</td><td><button class='btn btn-primary'><a href='updateRez.php?id=".$red->idRez ."' class='btnu'>Izmeni</a></button>"."</td><td><button data-id='". $red->idRez ."' class='rezBrisi'>Obriši</button></td></tr>";

                }

                echo "</tbody>";


            }



            ?>

        </table>




        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>




        <section class="ftco-section">
            <div class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerr">Insert Reservation</h2>
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="text" class="form-control" id="book_date" placeholder="Date">
                                    </div>
                                    <p id="erorD"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Time</label>
                                        <input type="text" class="form-control" id="book_time" placeholder="Time">
                                    </div>
                                    <p id="erorV"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Guests</label>
                                        <div class="select-wrap one-third">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="gosti" id="gosti" class="form-control">
                                                <option value="0">Choose</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p id="erorGS"></p>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="button"  id="but" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka4"></div>
                    </div>
                </div>
            </div>
        </section>




        <h3 class="naslov228">Upravljanje linkovima</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id linka</td>
                <td>Ime linka</td>
                <td>Putanja linka</td>
                <td>Roditelj</td>

            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from linkovi;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from linkovi LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();

            if($priprema){
                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>" .$red->idLink."</td><td>".$red->imeLinka."</td><td>".$red->putanja."</td><td>".$red->roditelj."</td><td><button class='btn btn-primary'><a href='updateLink.php?id=".$red->idLink ."' class='btnu'>Izmeni</a></button>"."</td><td><button data-id='". $red->idLink ."' class='linkBrisi'>Obriši</button></td></tr>";

                }

                echo "</tbody>";


            }



            ?>

        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>


        <section  class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert Link</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Link Name</label>
                                        <input type="text" id="nlink" class="form-control" placeholder="Link Name">
                                    </div>
                                    <p id="eror19"></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Link Href</label>
                                        <input type="text" id="hlink" class="form-control" placeholder="Href">
                                    </div>
                                    <p id="erorDl"></p>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="button"  id="buton" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka45"></div>
                    </div>
                </div>
            </div>
        </section>




        <h3 class="naslov228">Upravljanje obrocima</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id obroka</td>
                <td>Naziv obroka</td>

            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from obrok;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from obrok LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();

            if($priprema){
                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>" .$red->idObrok."</td><td>".$red->naziv."</td><td><button class='btn btn-primary'><a href='updateObrok.php?id=".$red->idObrok ."' class='btnu'>Izmeni</a></button>"."</td><td><button data-id='". $red->idObrok ."' class='obrokBrisi'>Obriši</button></td></tr>";

                }

                echo "</tbody>";


            }



            ?>

        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>



        <section  class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert Meal</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Meal Name</label>
                                        <input type="text" id="meal" class="form-control" placeholder="Meal Name">
                                    </div>
                                    <p id="erorDl1"></p>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="button"  id="buton11" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka454"></div>
                    </div>
                </div>
            </div>
        </section>






        <h3 class="naslov228">Upravljanje osobljem</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id osoblja</td>
                <td>Slika</td>
                <td>Zanimanje</td>
                <td>Ime i prezime</td>
                <td>Id restorana</td>
            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from osoblje;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from osoblje LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();


            if($priprema){

                 echo "<tbody>";

                 foreach($priprema as $red){

                  echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>".$red->idOsoblje."</td><td><img width='75px' height='60px' src='".$red->slika."'/></td><td>".$red->tekst. "</td><td>".$red->naslov."</td><td>".$red->idRestoran."</td><td><button data-id='".$red->idOsoblje."' class='osobljeBrisi'>Obriši</button></td></tr>";

                }
              echo "</tbody>";


            }


            ?>



        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>





        <section class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert Staff</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form action="modules/insertStaff.php" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input type="file" name="slika" id="slika" class="form-control">
                                    </div>
                                    <p id="erorpic"></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Occupation</label>
                                        <input type="text" name="zanimanje" id="zanimanje" class="form-control" placeholder="Occupation">
                                    </div>
                                    <p id="erorocc"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name and Surname</label>
                                        <input type="text" name="podaci" class="form-control" id="podaci" placeholder="Name and surname">
                                    </div>
                                    <p id="erorns"></p>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" name="send" id="buton33" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka455"></div>
                    </div>
                </div>
            </div>
        </section>





        <h3 class="naslov228">Upravljanje specijalitetima</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id specijaliteta</td>
                <td>Naziv</td>
                <td>Opis</td>
                <td>Slika</td>
                <td>Cena</td>
                <td>Id restorana</td>
            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from specijaliteti;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from specijaliteti LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();


            if($priprema){

                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>".$red->idSpec."</td><td>".$red->naziv. "</td><td>".$red->opis. "</td><td><img width='75px' height='60px' src='".$red->slika."'/></td><td>".$red->cena."</td><td>".$red->idRestoran."</td><td><button class='btn btn-primary'><a href='updateSpec.php?id=".$red->idSpec ."' class='btnu'>Izmeni</a></button>"."</td><td><button data-id='".$red->idSpec."' class='specBrisi'>Obriši</button></td></tr>";

                }
                echo "</tbody>";


            }


            ?>



        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>


        <section class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert Speciality</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form action="modules/insertSpec.php" enctype="multipart/form-data" method="post">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="specn" id="specn" class="form-control" placeholder="Name">
                                    </div>
                                    <p id="erorspn"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" name="descr" class="form-control" id="descr" placeholder="Description">
                                    </div>
                                    <p id="erordes"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input type="file" name="slikas" id="slikas" class="form-control">
                                    </div>
                                    <p id="erorpics"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" name="price" class="form-control" id="price" placeholder="Price in number">
                                    </div>
                                    <p id="erorpri"></p>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" name="sendi" id="buton330" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka4553"></div>
                    </div>
                </div>
            </div>
        </section>








        <h3 class="naslov228">Upravljanje vestima</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id vesti</td>
                <td>Slika</td>
                <td>Datum objave</td>
                <td>Naslov</td>
                <td>Tekst</td>
                <td>Id restorana</td>
            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from vesti;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from vesti LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();


            if($priprema){

                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>".$red->idVest."</td><td><img width='75px' height='60px' src='".$red->slikaVest."'/></td><td>".$red->datum. "</td><td>".$red->naslovVest."</td><td>".$red->tekst."</td><td>".$red->idRestoran."</td><td><button class='btn btn-primary'><a href='updateVest.php?id=".$red->idVest ."' class='btnu'>Izmeni</a></button>"."</td><td><button data-id='".$red->idVest."' class='vestBrisi'>Obriši</button></td></tr>";

                }
                echo "</tbody>";


            }


            ?>



        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>




        <section class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert News</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form action="modules/insertNews.php" enctype="multipart/form-data" method="post">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input type="file" name="slikav" id="slikav" class="form-control">
                                    </div>
                                    <p id="erorpics"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" name="datumv" class="form-control"  placeholder="Date">
                                    </div>
                                    <p id="erorspn"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Caption</label>
                                        <input type="text" name="naslovv" class="form-control" id="naslovv" placeholder="Caption">
                                    </div>
                                    <p id="erordes"></p>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" name="tekstv" class="form-control" id="tekstv" placeholder="Description">
                                    </div>
                                    <p id="erorpri"></p>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" name="sending" id="buton339" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka4553"></div>
                    </div>
                </div>
            </div>
        </section>







        <h3 class="naslov228">Upravljanje komentarima</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id komentara</td>
                <td>Ime korisnika</td>
                <td>Komentar</td>
                <td>Id vesti</td>
            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from komentari;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from komentari LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();


            if($priprema){

                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>".$red->idKomentar."</td><td>".$red->imeKorisnika. "</td><td>".$red->komentar."</td><td>".$red->idVest."</td>"."<td><button data-id='".$red->idKomentar."' class='komBrisi'>Obriši</button></td></tr>";

                }
                echo "</tbody>";


            }


            ?>



        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>





        <h3 class="naslov228">Upravljanje anketom</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id ankete</td>
                <td>Pitanje</td>
            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from anketa;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from anketa LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();


            if($priprema){

                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>".$red->id."</td><td>".$red->pitanje. "</td><td><button class='btn btn-primary'><a href='updateAnk.php?id=".$red->id ."' class='btnu'>Izmeni</a></button>"."</td>"."<td><button data-id='".$red->id."' class='ankBrisi'>Obriši</button></td></tr>";

                }
                echo "</tbody>";


            }


            ?>



        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>



        <section class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert Poll</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form action="#" enctype="multipart/form-data" method="post">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Question</label>
                                        <input type="text" name="ankpitanje" id="ankpitanje" placeholder="First Letter Uppercase" class="form-control">
                                    </div>
                                    <p id="erorpoll"></p>
                                </div>




                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="button" name="sendque" id="butonque" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka4545"></div>
                    </div>
                </div>
            </div>
        </section>



        <h3 class="naslov228">Upravljanje odgovorima iz ankete(a)</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id odgovora</td>
                <td>Odgovor</td>
                <td>Id ankete</td>
                <td>Broj glasova</td>
            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from odgovor;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from odgovor LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();


            if($priprema){

                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>".$red->id."</td><td>".$red->odgovor. "</td><td>".$red->idAnkete. "</td><td>".$red->brGlasova. "</td>"."<td><button data-id='".$red->id."' class='odgBrisi'>Obriši</button></td></tr>";

                }
                echo "</tbody>";


            }


            ?>



        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>





        <section class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert Answer</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form >
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Answer</label>
                                        <input type="text" name="ankodg1" id="anketaodgovor" placeholder="First Letter Uppercase" class="form-control">
                                    </div>
                                    <p id="erorans"></p>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Question</label>
                                        <select name="pitanje1" id="anketapitanje"
                                                class="form-control">
                                            <option value="">Choose</option>
                                            <?php
                                            include "modules/konekcija.php";
                                            $upit="SELECT * FROM anketa;";
                                            $pitanja=$konekcija->query($upit)->fetchAll();
                                            ?>

                                            <?php foreach($pitanja as $p): ?>
                                                <option value="<?= $p->id ?>">
                                                    <?= $p->pitanje ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <p id="erorua"></p>
                                </div>




                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="button"  id="butonanswers" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka4554"></div>
                    </div>
                </div>
            </div>
        </section>














        <h3 class="naslov228">Upravljanje jelima</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id jela</td>
                <td>Naziv jela</td>
                <td>Slika</td>
                <td>Id obroka</td>
                <td>Id cene jela</td>
            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from jelo;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from jelo LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();


            if($priprema){

                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>".$red->idJelo."</td><td>".$red->naziv. "</td><td><img width='75px' height='60px' src='".$red->slika."'/></td>"."<td>".$red->idObrok."</td>"."<td>".$red->idCenaJela."</td>"."</td><td><button data-id='".$red->idJelo."' class='jeloBrisi'>Obriši</button></td></tr>";

                }
                echo "</tbody>";


            }


            ?>



        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>





        <section class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert Dish</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form action="modules/insertDish.php" enctype="multipart/form-data" method="post">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="jelon" id="jelon" class="form-control" placeholder="Dish Name">
                                    </div>
                                    <p id="erorspn"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input type="file" name="slikaj" id="slikaj" class="form-control">
                                    </div>
                                    <p id="erorpics"></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" name="jeloc" class="form-control" id="jeloc" placeholder="Dish Price">
                                    </div>
                                    <p id="erordes"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Ingredients</label>
                                        <input type="text" name="jelosas" class="form-control" id="jelosas" placeholder="Type ingredients">
                                    </div>
                                    <p id="erorpri"></p>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" name="sendjelo" id="buton1000" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka4553"></div>
                    </div>
                </div>
            </div>
        </section>






        <h3 class="naslov228">Upravljanje desertima</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id deserta</td>
                <td>Naziv deserta</td>
                <td>Slika</td>
                <td>Id obroka</td>
                <td>Id cene deserta</td>
            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from desert;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from desert LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();


            if($priprema){

                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>".$red->idDesert."</td><td>".$red->naziv. "</td><td><img width='75px' height='60px' src='".$red->slika."'/></td>"."<td>".$red->idObrok."</td>"."<td>".$red->idCenaDes."</td>"."<td><button data-id='".$red->idDesert."' class='desBrisi'>Obriši</button></td></tr>";

                }
                echo "</tbody>";


            }


            ?>



        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>





        <section class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert Dessert</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form action="modules/insertDessert.php" enctype="multipart/form-data" method="post">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="desn" id="desn" class="form-control" placeholder="Dessert Name">
                                    </div>
                                    <p id="erorspn"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input type="file" name="slikadess" id="slikadess" class="form-control">
                                    </div>
                                    <p id="erorpics"></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" name="dessc" class="form-control" id="dessc" placeholder="Dessert Price">
                                    </div>
                                    <p id="erordes"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Ingredients</label>
                                        <input type="text" name="desssas" class="form-control" id="desssas" placeholder="Type ingredients">
                                    </div>
                                    <p id="erorpri"></p>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" name="senddesert" id="buton3320" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="poruka4553"></div>
                    </div>
                </div>
            </div>
        </section>




        <h3 class="naslov228">Upravljanje picima</h3>


        <table id="dataTable">
            <thead>
            <tr>
                <td>Id pica</td>
                <td>Naziv pica</td>
                <td>Slika</td>
                <td>Id obroka</td>
                <td>Id cene pica</td>
            </tr>
            </thead>


            <?php


            $upit="select COUNT(*) as br from pice;";
            $obj=$konekcija->query($upit)->fetch();

            $poStrani=2;
            $links=ceil($obj->br/$poStrani);

            $page=isset($_GET['page'])? $_GET['page']:1;


            $odakle=$poStrani*($page-1);

            $rez=$konekcija->query($upit)->fetchAll();

            $upit="select * from pice LIMIT $odakle,$poStrani;";
            $priprema=$konekcija->query($upit)->fetchAll();


            if($priprema){

                echo "<tbody>";

                foreach($priprema as $red){

                    echo "<tr xmlns=\"http://www.w3.org/1999/html\"><td>".$red->idPice."</td><td>".$red->naziv. "</td><td><img width='75px' height='60px' src='".$red->slika."'/></td>"."<td>".$red->idObrok."</td>"."<td>".$red->idCenaPica."</td>"."<td><button data-id='".$red->idPice."' class='piceBrisi'>Obriši</button></td></tr>";

                }
                echo "</tbody>";


            }


            ?>



        </table>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for($i=0;$i<$links;$i++):?>
                            <li><a href="admin.php?page=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>



        <section class="ftco-section">
            <div id="prijem" class="container">
                <div class="row no-gutters justify-content-center mb-5 pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2 id="pomerra">Insert Drink</h2>
                    </div>
                </div>
                <div class="row d-flex">

                    <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
                        <form action="modules/insertDrink.php" enctype="multipart/form-data" method="post">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="drn" id="drn" class="form-control" placeholder="Drink Name">
                                    </div>
                                    <p id="erorspn"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input type="file" name="slikapice" id="slikapice" class="form-control">
                                    </div>
                                    <p id="erorpics"></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" name="picec" class="form-control" id="picec" placeholder="Drink Price">
                                    </div>
                                    <p id="erordes"></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Ingredients</label>
                                        <input type="text" name="picesas" class="form-control" id="picesas" placeholder="Type ingredients">
                                    </div>
                                    <p id="erorpri"></p>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <button type="submit" name="sendpice" id="buton1330" value="Make a Reservation" class="btn btn-primary py-3 px-5">Insert</button>
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

    else:
        header("Location: index.php");
    endif;
else:
    header("Location: index.php");

endif;

?>


<?php
include "views/photos.php";
include "views/footer.php";
?>