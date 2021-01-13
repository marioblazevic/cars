<div id="users">
    <div class="container">
    <?php
        if(!isset($_SESSION['korisnik'])){
        echo "
        <a href='index.php?page=login' class='link'>Log in</a>
        <a href='index.php?page=register' class='link'>Registracija</a>
            ";
        }else{
        echo "<a href='index.php?page=logout' class='link'>Log out</a>";
        }
        if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->naziv=="admin"){
        echo "<a href='admin.php' class='link'>Admin</a>";
        }
    ?>
        
    </div>
</div>