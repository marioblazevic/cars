<section id="boxes">
      <div class="container">
          <h2 style="text-align:center"></h2>
        <?php
            
            $upit = "SELECT * FROM auto a inner join model m on a.idModel=m.idModel ORDER by datum DESC LIMIT 0,3";
            $rezultat = $conn->query($upit);
            if($rezultat){
                $podaci = $rezultat->fetchAll();
                foreach($podaci as $podatak){
                    echo "<div class='box'>
                    <img src='".$podatak->slika."'>
                    <h3>$podatak->naziv</h3>
                    <p>$podatak->opis</p>
                </div>";
                }
            }
        ?>
      </div>
</section>

