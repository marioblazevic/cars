<?php

    session_start();
    $statusCode = 404;

    if(($_SERVER['REQUEST_METHOD'] != "POST") && (isset($_SESSION['korisnik'])!="admin")){
        $statusCode = 500;
    }else{
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            include('conn.php');
            $query = $conn->prepare("DELETE FROM korisnik WHERE idKorisnik=:id");
            $query->bindParam(':id',$id);
            try{
                $result = $query->execute();
                if($result){
                    $statusCode = 204;
                }else{
                    $statusCode = 500;
                }
            }catch(PDOException $e){
                $statusCode = 500;
            }
        }
        http_response_code($statusCode);
    }

?>