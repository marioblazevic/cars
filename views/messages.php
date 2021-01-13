<div class="container">

    <?php

    include('modules/conn.php');

    $upit = "select * from poruka order by datum desc";

    $priprema = $conn->query($upit);

    if($priprema){
        $podaci = $priprema->fetchAll();

        foreach($podaci as $podatak){
            $datum = $podatak->datum;
            $tmp = strtotime($datum);
            $datumIspis = date("d.m.Y",$tmp);
            echo "<div class='poruka'>
                    <h3>$podatak->naslov</h3>
                    <p>$podatak->tekst</p>
                    <p class='korisnik'>$podatak->imePrezime $datumIspis</p>
                </div>";
        }

    }


?>

</div>
