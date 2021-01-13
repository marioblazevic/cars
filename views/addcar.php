<div class="container">
    <div id="addCar">
    <form action="modules/insert_post.php" method="POST" enctype="multipart/form-data">
        Naslov: <input type="text" style="border:1px solid red;" name="tbNaslov" id=""> <br> <br> <br>
        Text:
        <textarea name="taTekst" id="textarea"  style="border:1px solid red;" ></textarea> <br> <br>
        <select name="ddlModel" id="ddlModel">
              <?php
                $upit = "select * from model";
                $priprema = $conn->query($upit);
                if($priprema){
                    $podaci = $priprema->fetchAll();
                    foreach($podaci as $podatak){
                        echo "<option value='$podatak->idModel'>".$podatak->naziv."</option>";
                    }
                }
              ?>
          </select> <br>
        <input type="file"  name="fajl" id=""> <br> <br>
        <input type="submit" value="Dodaj" class="button_1" name="btnDodaj">
    </form>
    </div>
</div>

