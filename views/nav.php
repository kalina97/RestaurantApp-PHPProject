<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Tasty Restaurant</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">

            <ul class="navbar-nav ml-auto">

                <?php
                include "modules/konekcija.php";
                $upit="SELECT * FROM linkovi;";
                $rezultat=$konekcija->query($upit)->fetchAll();

                if(!isset($_SESSION['korisnik'])):?>
                    <li class="nav-item"><a href="<?= $rezultat[0]->putanja ?>" class="nav-link"> <?= $rezultat[0]->imeLinka ?> </a></li>
                    <li class="nav-item"><a href="<?= $rezultat[6]->putanja ?>" class="nav-link"> <?= $rezultat[6]->imeLinka ?> </a></li>
                    <li class="nav-item"><a href="<?= $rezultat[7]->putanja ?>" class="nav-link"> <?= $rezultat[7]->imeLinka ?> </a></li>

                <?php endif;?>


                <?php
                if(isset($_SESSION['korisnik'])):
                    foreach ($rezultat as $red):?>
                        <li class="nav-item"><a href="<?= $red->putanja ?>" class="nav-link"> <?= $red->imeLinka ?> </a></li>

                <?php endforeach;?>
                <?php endif;?>

                <?php
                if(isset($_SESSION['korisnik'])){

                    echo '<li class="nav-item"><a href="modules/logout.php" class="nav-link">Logout</a></li>';

                   }
                else{

                    echo '<li class="nav-item"><a href="index.php?page=login" class="nav-link">Login</a></li>';
                }

                    ?>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->