<?php

    session_start();
    if($_SESSION['korisnik']->naziv=="admin"){
        include('views/head.php');
    include('views/header.php');
    include('views/user.php');
    include('views/adminlinks.php');

    if(isset($_GET['page'])){
        $page=$_GET['page'];
        switch($page){
            case "admincars" : include('views/admincars.php'); break;
            case "users" : include('views/users.php'); break;
            case "home" : include('views/showcase.php');
                        include('views/search.php');
                        include('views/recent.php'); break;
            case "register" : include('views/register.php'); break;
            case "about" : include('views/about.php'); break;
            case "services" : include('views/services.php'); break;
            case "register" : include('views/register.php'); break;
            case "login" : include('views/login.php'); break;
            case "logout" : include('modules/logout.php'); break;
            case "about" : include('views/author.php'); break;
            case "messages" : include('views/messages.php'); break;
        }
    }else{
        include('views/users.php');
    }

    include('views/footer.php');
    }else{
        header("Location: index.php");
    }
    

?>