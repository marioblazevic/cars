<div class="container">
    
        <?php

        include('addcar.php');

            
            $upit = "SELECT * FROM auto a inner join model m on a.idModel=m.idModel";
            $rezultat = $conn->query($upit);
            if($rezultat){
                $ispis="";
                $podaci = $rezultat->fetchAll();
                foreach($podaci as $podatak){
                    echo "<div class='car'>
                    <h1>$podatak->Anaslov</h1>
                    <img src='".$podatak->slika."'>
                    <div class='tekst'>
                    <p>Model: $podatak->naziv</p>
                        <p>$podatak->opis</p>
                    </div>
                    <div class='clearfix'></div>
                    <div class='autoBrisanje'>
                    <form action='modules/delete_post.php' method='get'>
                        <input type='submit' class='button_1' name='btnObrisi' value='Izbrisi'>
                        <input type='hidden' name='carId' value='$podatak->idAuto'>
                    </form>
                    </div>
                </div>";
                }
            }


        ?>
        
</div>


