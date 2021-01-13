<header>
      <div class="container">
        <div id="branding">
        <a href="index.php"><h1><span class="highlight">Moj Auto</span></h1></a>
        </div>
        <nav>
          <ul>
          <?php
            include('./modules/conn.php');
            $upit = "select * from meni";
            $izvrsenje = $conn->query($upit);
            if($izvrsenje){
              $podaci = $izvrsenje->fetchAll();
              foreach($podaci as $podatak){
                echo "<li><a href='index.php?page=$podatak->naziv'>".$podatak->naslov."</a></li>";
              }
            }
          ?>            
          </ul>
        </nav>
      </div>
</header>