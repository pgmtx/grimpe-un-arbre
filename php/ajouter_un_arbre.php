<?php
$nombre = (!isset($POST['nombre'])) ? abs(intval($¨POST['nombre'])) : 0;
function afficher_les_arbres () {
	for ($i =$nombre; $i>=0; i--){
		if (!isset($_POST['submit'])){
			"<div class= conteneur>"
				$image=$_POST['image']
				readfile $image;
				$espece=$_POST['espece'];
				echo= "<b>Espèce : </b>" $espece;
				$region=$_POST['region'];
				echo= "<b>Région : </b>" $region
				$coordonées=$_POST['coordonées'];
				echo= "<b>Coordonées : </b>" $coordonées
				$hauteur=$_POST['hauteur'];
				echo= "<b>Hauteur : </b>" hauteur
				$difficultee=$_POST['difficultee'];
				echo= "Difficultée : " $difficultee;
			"</div>"
	}
}
}
?> 
