<?php

include('conn.php');

$code = 404;
$data=null;
if(isset($_POST['send'])){
    $imePrezime = $_POST['podatakIme'];
    $naslov = $_POST['podatakNaslov'];
    $tekst = $_POST['podatakTekst'];

    $reNaslov = "/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})*$/";
    $reImePrezime = "/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/";
    
    // $pol = $_POST['pol'];
    $greske = [];
    $podaci = [];

    if(!preg_match($reImePrezime,$imePrezime)){
        $greske[] = "Lose uneto ime";
    }
    if(!preg_match($reNaslov,$naslov)){
        $greske[] = "Lose unet naslov";
    }
    if($tekst==""){
        $greske[] = "Unesite tekst";
    }

    if(count($greske)>0){
        $code = 422;
        $data = $greske;
    }else{
        $upit = "INSERT INTO poruka(imePrezime,naslov,tekst) values(:ime,:naslov,:tekst)";
        $priprema = $conn->prepare($upit);
        $priprema->bindParam(':ime',$imePrezime);
        $priprema->bindParam(':naslov',$naslov);
        $priprema->bindParam(':tekst',$tekst);
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

