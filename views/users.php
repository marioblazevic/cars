<?php

    if($_SESSION['korisnik']->naziv=="admin"){
        include('modules/conn.php');
        $upit = "select * from korisnik k inner join uloga u on k.idUloga=u.idUloga";
        $priprema = $conn->query($upit);
        if($priprema){
            $podaci = $priprema->fetchAll();
        }
    }

?>

<div class="container">
    <div class="adminLink">
    <h1>Upravljanje korisnicima:</h1>
        <table style="width:100%">
            <tr>
                <th>ImePrezime</th>
                <th>Username</th> 
                <th>Uloga</th>
                <th>Email</th>
                <th>Izmeni</th>
                <th>Obrisi</th>
            </tr>
  
            <?php

            foreach($podaci as $podatak){
                echo "<tr>
                        <td>$podatak->imePrezime</td>
                        <td>$podatak->username</td>
                        <td>$podatak->naziv</td>
                        <td>$podatak->email</td> 
                        <td><a href='#' class='update-user' data-id='$podatak->idKorisnik'>Izmeni</a></td> 
                        <td><a href='#' class='delete-user' data-id='$podatak->idKorisnik'>Obrisi</a></td> 
                    </tr>";
            }

            ?>  
        </table>
    </div>
</div>

<div class="container">
      <h2 class='contact'>Izmeni :</h2>
      <div id="errors"></div>
      <div class="contactForm">
      <form action="#" method="post" id="forma">
          <input type="text" placeholder="Ime i prezime" id="tbImePrezime" name="tbImePrezime"><br>
          <input type="text" placeholder="Username" id="tbUserName" name="tbUserName"><br>
          <input type="password" placeholder="Password" id="tbPassword" name="tbPassword"><br><br>
          <input type="text" placeholder="Email" id="tbEmail" name="tbEmail"><br><br>
          <input type="hidden" name="idKor" id="idKor" value="">
          
          <select name="ddlUloga" id="ddlUloga">
              <?php
                $upit = "select * from uloga";
                $priprema = $conn->query($upit);
                if($priprema){
                    $podaci = $priprema->fetchAll();
                    foreach($podaci as $podatak){
                        echo "<option value='$podatak->idUloga'>".$podatak->naziv."</option>";
                    }
                }
              ?>
          </select>
          

          <input type="button" class="button_1" name="Salji" id="btnIzmeniKor" name="btnIzmeniKor" value="Izmeni">
        </form>
        <div class="space"></div>
        <div id="ispis"></div>
      </div>
    </div>

    <div class="container">
      <h2 class='contact'>Dodaj novog korsnika :</h2>
      <div id="errors1"></div>
      <div class="contactForm">
      <form action="#" method="post" id="forma2">
          <input type="text" placeholder="Ime i prezime" id="tbImePrezime1" name="tbImePrezime"><br>
          <input type="text" placeholder="Username" id="tbUserName1" name="tbUserName1"><br>
          <input type="password" placeholder="Password" id="tbPassword1" name="tbPassword"><br><br>
          <input type="text" placeholder="Email" id="tbEmail1" name="tbEmail"><br><br>
          <input type="hidden" name="idKor" id="idKor1" value="">
          
          <select name="ddlUloga" id="ddlUloga1">
              <?php
                $upit = "select * from uloga";
                $priprema = $conn->query($upit);
                if($priprema){
                    $podaci = $priprema->fetchAll();
                    foreach($podaci as $podatak){
                        echo "<option value='$podatak->idUloga'>".$podatak->naziv."</option>";
                    }
                }
              ?>
          </select>
          

          <input type="button" class="button_1" name="Salji" id="btnDodaj" name="btnDodaj" value="Dodaj">
        </form>
        <div class="space"></div>
        <div id="ispis"></div>
      </div>
    </div>