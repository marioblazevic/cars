<?php

// INSERT

if(isset($_POST['btnDodaj'])){

	include('conn.php');
	
	$naslov = $_POST['tbNaslov'];
	$tekst = $_POST['taTekst'];
	$model = $_POST['ddlModel'];

	// preuzimanje fajla
	
	$slika = $_FILES['fajl'];

	// var_dump($slika);

	$ime_fajla = $slika['name'];
	$tip_fajla = $slika['type'];
	$velicina_fajla = $slika['size'];

	//echo $velicina_fajla;
	$tmp_putanja = $slika['tmp_name'];

	// PROVERA
	$errors = [];

	$reNaslov = "/^[\w\s]{1,255}$/";

	if(!preg_match($reNaslov, $naslov)){
		$errors[] = "Naslov nije ok.";
	}

	/*if($tip_fajla != "image/jpg" && $tip_fajla!= "image/jpeg" && $tip_fajla != "images/png" && $tip_fajla != "image/gif"){
		$errors[] = "Tip fajla nije ok.";
	}*/

	$dozvoljeni_formati = array("image/jpg", "image/jpeg", "image/png", "image/gif");

	if(!in_array($tip_fajla, $dozvoljeni_formati)){
		$errors[] = "Tip fajla nije ok.";
	}

	if($velicina_fajla > 3000000){ // 3.000.000B ~ 3MB
		$errors[] = "Fajl mora biti manji od 3MB.";
	}

	if(count($errors) == 0){
		// mesto na koje ce se upload-ovati slika
		$naziv_fajla = time().$ime_fajla;
		$nova_putanja = "img/".$naziv_fajla;
		// var_dump(getcwd());

		// upload slike
		if(move_uploaded_file($tmp_putanja, "../".$nova_putanja)){
			// echo " adasdas";
			// Kreiranje male slike

			// $putanja_mala = "slike/".$naziv_fajla;
			// malaSlika($nova_putanja, $putanja_mala, 200, 200);
			
			// unos u bazu!

			// $unos_slika = "INSERT INTO slika VALUES('', :alt, :putanja,'')";

			// $priprema_slika = $konekcija->prepare($unos_slika);

			// $priprema_slika->bindParam(":alt", $naslov);
			// $priprema_slika->bindParam(":putanja", $nova_putanja);
			// $priprema_slika->bindParam(":mala", $putanja_mala);

			try{
				// $rez_unos = $priprema_slika->execute();

				$id_slika = $conn->lastInsertId();

				$unos_post = "INSERT INTO auto(idModel,slika,opis,Anaslov) VALUES(:model, :slika, :opis, :naslov)";

				$priprema_post = $conn->prepare($unos_post);

				$priprema_post->bindParam(":model", $model);
				$priprema_post->bindParam(":slika", $nova_putanja);
				$priprema_post->bindParam(":opis", $tekst);
				$priprema_post->bindParam(":naslov", $naslov);


				$uneto = $priprema_post->execute();

				if($uneto){
					header('Location: ../admin.php?page=admincars');
				}

			}
			catch(PDOException $ex){
				echo $ex->getMessage();
			}

		} else {
			echo "Nije uspeo upload fajla!";
		}
	}
	else {

		echo "<ol>";
		
		foreach($errors as $error){
			echo "<li> $error </li>";
		}

		echo "</ol>";
	}
}