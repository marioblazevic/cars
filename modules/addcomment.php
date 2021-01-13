<?php

    session_start(); 
    // Ovde mora session start jer se dohvata idKorisnika a u drugim primerima nije potreban id korisnika pa ne mora session start

    include('conn.php');

    if(isset($_GET['btnKom'])){
        
        $tekst = $_GET['taTekst'];
        $idAuto = $_GET['idAuto'];
        $idKorisnik = $_SESSION['korisnik']->idKorisnik;
        $datum = mktime();

        if($tekst==""){
            header("Location: ../index.php?page=car&carId=$idAuto");
        }else{
            $upit = "insert into komentar(tekst,idKorisnik,idAuto) values(:tekst,:idKor,:idAuto)";
        $priprema = $conn->prepare($upit);
        $priprema->bindParam(':tekst',$tekst);
        $priprema->bindParam(':idKor',$idKorisnik);
        $priprema->bindParam(':idAuto',$idAuto);

        try{
            $priprema->execute();

            if($priprema){
                header("Location: ../index.php?page=car&carId=$idAuto");
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        }

    }

?>