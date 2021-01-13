<div class="container">

    <?php

        include('conn.php');

        if(isset($_GET['carId'])){
            $idAuto = $_GET['carId'];
            
            $upit = "select * from auto a inner join model m on a.idModel=m.idModel where idAuto=:id";
            $rezultat=$conn->prepare($upit);
            $rezultat->bindParam(":id",$idAuto);

            try{
                $rezultat->execute();
                $auto = $rezultat->fetch();
                if($auto){
                    echo "<div class='car'>
                    <h1>$auto->naziv</h1>
                    <img src='".$auto->slika."'>
                    <div class='tekst'>
                        <p>$auto->opis</p>
                    </div></div>";
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }

    ?>

    <?php if(isset($_SESSION['korisnik'])): ?>
        <h3 style="text-align:center;">Ostavite komentar:</h3>
        <form action="modules/addcomment.php" method="get" id="formaKomentar">
          <textarea id="taTekst" cols="30" rows="10" name="taTekst"></textarea>
          <br><br>
          <input type="hidden" name="idAuto" value="<?php echo $auto->idAuto; ?>">
          <input type="submit" class="button_1" name="btnKom" id="btnKom"  value="Komentarisi">
        </form>
    <?php endif; ?>

        <div class="komentari">
            <h3>Komentari:</h3>
            <?php

                $upit = "select * from komentar kom inner join korisnik k on kom.idKorisnik=k.idKorisnik inner join auto a on kom.idAuto=a.idAuto where a.idAuto=:idAuto order by kom.datum desc";

                $priprema = $conn->prepare($upit);
                $priprema->bindParam(':idAuto',$idAuto);
                try{
                    $priprema->execute();
                    if($priprema){
                        $podaci = $priprema->fetchAll();
    
                        foreach($podaci as $podatak){
                            $datum = $podatak->datum;
                            $tmp = strtotime($datum);
                            $datumIspis = date("d.m.Y",$tmp);
                            echo "<div class='poruka'>
                                    <p>$podatak->tekst</p>
                                    <p class='korisnik'>$podatak->imePrezime $datumIspis</p>
                                </div>";
                        }
    
                    }
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                


        ?>
        </div>

</div>

