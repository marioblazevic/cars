<?php
session_start();

echo "caos";

if(!isset($_SESSION['korisnik'])) {
    $_SESSION['poruka'] = "Niste ulogovani.";
    header("Location: index.php");
}

if($_SESSION['korisnik']->naziv != "admin"){
    $_SESSION['poruka'] = "Niste admin!";
    header("Location: index.php");
}

if(isset($_GET['carId'])){
    $id_car = $_GET['carId'];

    echo $id_car;

    include "conn.php";

   
    try{

        $post_car = " SELECT *
                    FROM auto 
                        
                    WHERE idAuto = :id";
        $priprema = $conn->prepare($post_car);
        $priprema->bindParam(":id", $id_car);

        $rez = $priprema->execute();

        if($rez){
            $post = $priprema->fetch(); 

            if(!empty($post)){

                $upit = "   DELETE 
                FROM auto 
                WHERE idAuto = :id";

                $priprema = $conn->prepare($upit);
                $priprema->bindParam(":id", $id_car);

                $rez = $priprema->execute();

                if($rez){

                    unlink("../".$post->slika);

                   
                } else {
                     $_SESSION['poruka'] = "Greska pri brisanju posta iz baze!";
                }
            } else {
                $_SESSION['poruka'] = "Post nije dohvacen iz baze!";
            }
        } else {
            $_SESSION['poruka'] = "Greska pri dohvatanju posta i slike iz baze!";
        }
    }
    catch(PDOException $ex){
        $_SESSION['poruka'] = $ex->getMessage();
    }

    header("Location: ../admin.php?page=admincars");
}

echo $_SESSION['poruka'];