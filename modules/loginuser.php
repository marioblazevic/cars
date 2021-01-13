<?php
    
    session_start();
    

    if (isset($_POST['btnLogin'])) { 


        unset($_SESSION['greske']);
        unset($_SESSION['greskeMatch']);
        $username = $_POST['tbUserName'];
        $password = $_POST['tbPassword']; 
        $rePassword = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
        $reUserName = "/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/";
        $greske = [];
        
        if(!preg_match($rePassword,$password)){
            $greske[] = "Lose unet password";
        }   
        if(!preg_match($reUserName,$username)){
            $greske[] = "Lose unet username";
        }
        if (count($greske) > 0) {
        $_SESSION['greske'] = $greske;
            header("Location: ../index.php?page=login");
        } else {

        include "conn.php";

        
        $upit = "select * from korisnik k inner join uloga u on k.idUloga=u.idUloga where k.username=:username and k.password=:password";
        $priprema = $conn->prepare($upit);
        $priprema->bindParam(":username", $username);
        $priprema->bindParam(":password", $password);
        
        try{
            $priprema->execute();
            if($priprema->rowCount()==1){
                $korisnik = $priprema->fetch();
                $_SESSION['korisnik'] = $korisnik;
                if($korisnik->naziv=="admin"){
                    header("Location: ../admin.php");
                }else{
                    header("Location: ../index.php");
                }
            }else{
                $_SESSION['greskeMatch'] = "Unesite ispravan username i password!";
                header("Location: ../index.php?page=login");
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    } 

?>