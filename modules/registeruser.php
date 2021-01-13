<?php

// Registracija korisnika

include('conn.php');

$code = 404;
$data=null;
if(isset($_POST['send'])){
    $imePrezime = $_POST['podatakIme'];
    $username = $_POST['podatakUserName'];
    $password = $_POST['podatakPassword'];
    $email = $_POST['podatakEmail'];
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
        $upit = "INSERT INTO korisnik(imePrezime,username,password,idUloga,email) values(:ime,:username,:password,2,:email)";
        $priprema = $conn->prepare($upit);
        $priprema->bindParam(':ime',$imePrezime);
        $priprema->bindParam(':username',$username);
        $priprema->bindParam(':password',$password);
        // $priprema->bindParam(':pol',$pol);
        $priprema->bindParam(':email',$email);
        $priprema->bindParam(':ime',$imePrezime);
        $priprema->execute();
       
       if($priprema){
           $code = 201;
       }else{
           $code=500;
       }


    }
}
http_response_code($code);
echo json_encode($data);

?>

