<div class="container">
    
        <?php

            
            $upit = "SELECT * FROM auto a inner join model m on a.idModel=m.idModel order by datum desc";
            $rezultat = $conn->query($upit);
            if($rezultat){
                $ispis="";
                $podaci = $rezultat->fetchAll();
                foreach($podaci as $podatak){
                    echo "<a href='index.php?page=car&carId=$podatak->idAuto'><div class='car'>
                    <h1>$podatak->Anaslov</h1>
                    <img src='".$podatak->slika."'>
                    <div class='tekst'>
                    <p>Model: $podatak->naziv</p>
                        <p>$podatak->opis</p>
                    </div>
                    </div></a>";
                }
            }


        ?>
        
</div>
