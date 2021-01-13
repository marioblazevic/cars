<div class="container">
    <div id="autor">
    <h2>Nešto o meni</h2><br/>
        <img src="img/ja.jpg" alt="marioblazevic"/><br/><br/>
        Ime:&nbsp;Mario<br/>
        Prezime:&nbsp;Blažević<br/>
        Datum rođenja:&nbsp;13.04.1997.<br/>
        Zanimanje:&nbsp;Student Visoke ICT škole u Beogradu<br/>
        <h1> <a href="mariodoc.pdf">DOKUMENTACIJA</a></h1>
    </div>
    <div id="glasanje">
    <h1>Glasajte za najbolju marku automobila:</h1>
    <?php
        if(isset($_SESSION['korisnik'])){
            $id = $_SESSION['korisnik']->idKorisnik;
        }
        $query = $conn->prepare("select k.imePrezime from korisnik k INNER join anketa a on k.idKorisnik=a.idKorisnik where k.idKorisnik=:id and glasao=1");
        $query->bindParam(':id', $id);
        $query->execute();
        $rez = $query->fetch();
        if($rez == false):
        ?>                      
        <form class = "form-group" method = "post" action ="modules/survey.php">
          <label>Audi: </label>&nbsp;<input type = "radio"
          value = "1" name = "anketa" /> <br>
          <label>BMW: </label>&nbsp;<input type =
          "radio" value = "2" name = "anketa" /> <br>
          <label>Mercedes: </label>&nbsp;<input type =
          "radio" value = "3" name = "anketa" /> <br>
          <?php if(isset($_SESSION['korisnik'])): ?>
            <input type = "submit" class = "btn btn-default button_1"
            name = "anketaSubmit" value = "submit" /> <br />
            <?php else:?> 
            <input type="button" id = "noAcc" class = "button_1" value = "Glasaj" />
            <?php endif;?> 
        </form>
        <?php else: ?>
        <h5>Vec ste glasali! </h5>
        <?php endif; ?>  
        <?php
            $upit = "select m.naziv, a.idMarka from marka m INNER join anketa a on m.idMarka=a.idMarka GROUP by a.idMarka order by COUNT(a.idMarka) DESC limit 0,1";
            $priprema = $conn->query($upit);
            if($priprema){
                $podaci = $priprema->fetch();
                echo "Trenutno najglasanija marka je: ".$podaci->naziv;
            }
        ?>
        
    </div>
</div>