<?php

// Dodavanje korisnika

include('conn.php');

$code = 404;
$data=null;
if(isset($_POST['send'])){
    $imePrezime = $_POST['podatakIme'];
    $username = $_POST['podatakUserName'];
    $password = $_POST['podatakPassword'];
    $email = $_POST['podatakEmail'];
    $uloga = $_POST['podatakUloga'];
    $reImePrezime = "/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/";
    $rePassword = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
    $reEmail = "/^[a-z][a-z0-9\.\_]{2,40}\@([a-z]{3,8}\.)com$/";
    $reUserName = "/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/";
    // $pol = $_POST['pol'];
    $greske = [];
    $podaci = [];

    if(!preg_match($reImePrezime,$imePrezime)){
        $greske[] = "Lose uneto ime";
    }
    if(!preg_match($rePassword,$password)){
        $greske[] = "Lose unet password";
    }
    if(!preg_match($reEmail,$email)){
        $greske[] = "Lose unet email";
    }
    if(!preg_match($reUserName,$username)){
        $greske[] = "Lose unet username";
    }

    if(count($greske)>0){
        $code = 422;
        $data = $greske;
    }else{
        $upit = "INSERT INTO korisnik(imePrezime,username,password,idUloga,email) values(:ime,:username,:password,:uloga,:email)";
        $priprema = $conn->prepare($upit);
        $priprema->bindParam(':ime',$imePrezime);
        $priprema->bindParam(':username',$username);
        $priprema->bindParam(':password',$password);
        $priprema->bindParam(':uloga',intval($_POST['podatakUloga']));
        $priprema->bindParam(':email',$email);
        $priprema->bindParam(':ime',$imePrezime);
    //     $priprema->execute();
       
    //    if($priprema){
    //        $code = 201;
    //    }else{
    //        $code=500;
    //    }

    try{
        $code = $priprema->execute() ? 201 : 500;
    }catch(PDOException $e){
        $code = 409;
    }

    //  Za try i catch -  Ako se ne izvrsi upit vratice nam 409 kod jer smo tako programirali ali ovde se ne vide greske nastale u kodu php-a koje nisu vezane za upit npr ako napravimo 
    // gresku za bindParam. To se vidi u consolelog(podaci) u success funkciji jer baza vrati 200 zato sto je upit uredu. Znaci ovde samo vratimo kod 409 i na osnovu njega se ispisuje poruka
    //  koju smo definisali u error-u koju mozemo prikazati korisniku posle sa inner html.
 

    }
}
http_response_code($code);
echo json_encode($data);

?>

