<?php
session_start();
$page = "";
if(isset($_GET['page'])){
    $page = $_GET['page'];
}

    include "views/head.php";
    include "views/nav.php";
    include "views/slider.php";
    switch ($page) {
        case "home":
            include "views/pocetna.php";
            break;
        case "login":
            include "views/login.php";
            break;
        case "register":
            include "views/register.php";
            break;
        case "autor":
            include "views/author.php";
            break;

        case "menu":

           include "views/menu.php";
           break;

        case "specialities":
            include "views/specialities.php";
            break;

        case "about":
            include "views/about.php";
            break;

        case "news":
            include "views/news.php";
            break;


        case "contact":
            include "views/contact.php";
            break;

        case "reservations":
            include "views/reservations.php";
            break;

        case "blog":
            include "views/blog.php";
            break;
        default:
            include "views/pocetna.php";
            break;
    }


include "views/photos.php";
include "views/footer.php";