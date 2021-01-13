<?php

    session_start();
    include('views/head.php');
    include('views/header.php');
    include('views/user.php');

    if(isset($_GET['page'])){
        $page=$_GET['page'];
        switch($page){
            case "home" : include('views/showcase.php');
                        include('views/search.php');
                        include('views/recent.php'); break;
            case "cars" : include('views/cars.php'); break;
            case "car" : include('modules/car.php'); break;
            case "contact" : include('views/contact.php');  break;
            case "register" : include('views/register.php'); break;
            case "services" : include('views/services.php'); break;
            case "register" : include('views/register.php'); break;
            case "login" : include('views/login.php'); break;
            case "logout" : include('modules/logout.php'); break;
            case "about" : include('views/author.php'); break;
        }
    }else{
        include('views/showcase.php');
        include('views/search.php');
        include('views/recent.php');
    }

    include('views/footer.php');

?>