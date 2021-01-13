<div class="container">
      <h2 class='contact'>Uloguj se:</h2>
      <p id='contactP'>Ukoliko želite da ostavite vase utiske o automobilima to mozete uciniti ovde..:</p>
      <div id="errors">
          <?php
            if(isset($_SESSION['greske'])){
                $greske = $_SESSION['greske'];
                // var_dump($greske);
                foreach($greske as $greska){
                    echo $greska."<br>";
                }
            }
            if(isset($_SESSION['greskeMatch'])){
                echo $_SESSION['greskeMatch'];
            }
          ?>
      </div>
      <div class="contactForm">
      <form action="modules/loginuser.php" method="post" id="formaLogin">
          <input type="text" placeholder="Username" id="tbUserName" name="tbUserName"><br>
          <input type="password" placeholder="Password" id="tbPassword" name="tbPassword"><br><br>
          <input type="submit" class="button_1"  id="btnLogin" name="btnLogin" value="Log in">
        </form>
        <div class="space"></div>
        <div id="ispis"></div>
      </div>
    </div>