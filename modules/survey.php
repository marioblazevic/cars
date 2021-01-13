<?php


    require_once "conn.php";
    session_start();
    if (isset($_SESSION['korisnik'])) {
        if(isset($_POST['anketaSubmit'])){
        $marka = $_POST['anketa'];
        $user_id = $_SESSION['korisnik']->idKorisnik;
        $voted = 1;
        $insertQuery = $conn->prepare("INSERT INTO
        anketa VALUES ('', :marka, :user, :vote)");
        $insertQuery->bindParam(':marka', intval($_POST['anketa']));
        $insertQuery->bindParam(':user', $user_id);
        $insertQuery->bindParam(':vote', $voted); 
        try {
        $rez = $insertQuery->execute();
        if($rez){
            header("Location: ../index.php?page=about");;
        } else {
            echo "Greska pri unosu ankete.";
        }
        }
            catch(PDOException $e){
            echo $e->getMessage();
        }
        }
    }


?>