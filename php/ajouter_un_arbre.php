<?php
$nombre = (!isset($POST['nombre'])) ? abs(intval($¨POST['nombre'])) : 0;
function afficher_les_arbres () {
	for ($i =$nombre; $i>=0; i--){
		if (!isset($_POST['submit'])){
			$image=$_POST['image'][i];
			$espece=$_POST['espece'][i];
			$region=$_POST['region'][i];
			$coordonées=$_POST['coordonées'][i];
			$hauteur=$_POST['hauteur'][i];
			$difficultee=$_POST['difficultee'][i];
			
			<div class="conteneur">
				readfile $image;
				echo= "<b>Espèce : </b>" $espece;
				echo= "<b>Région : </b>" $region;
				echo= "<b>Coordonées : </b>" $coordonées;
				echo= "<b>Hauteur : </b>" hauteur;
				echo= "Difficultée : " $difficultee;
			</div>
	}
}
}
?> 

