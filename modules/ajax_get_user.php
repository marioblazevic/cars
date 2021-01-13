<?php

    if(isset($_POST['id'])){
        header("Content-type: application/json");
        include('conn.php');
        $code = 404;
        $data=null;

        $query = "select * from korisnik k inner join uloga u on k.idUloga=u.idUloga where k.idKorisnik=:id";
        $izmena = $conn->prepare($query);
        $izmena->bindParam(':id',intval($_POST['id']));

        try{
            $izmena->execute();
            $korisnik = $izmena->fetch();
            if($korisnik){
                $data = $korisnik;
                $code = 201;
            }else{
                $code=500;
            }
        }catch(PDOException $e){
            $code = 500;
            $data = $e->getMessage();
        }
        http_response_code($code);
        echo json_encode($data);
    }

?>