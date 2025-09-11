<?php
// si le paramètre action n'est pas positionné alors
//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les Pegis
//		sinon l'action est celle indiquée par le bouton

if (!isset($_POST['cmdAction'])) {
	$action = 'afficherPegi';
} else {
	// par défaut
	$action = $_POST['cmdAction'];
}

$idPegiModif = -1;		// positionné si demande de modification
$notification = 'rien';	// pour notifier la mise à jour dans la vue

// selon l'action demandée on réalise l'action 
switch ($action) {

	case 'ajouterNouveauPegi': {
		if (!empty($_POST['txtLibPegi'])) {
			$idPegiModif = $db->ajouterPegis($_POST['txtLibPegi']);
			// $idPegiNotif est l'id Pegi du Pegi ajouté
			$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
		}
		break;
	}

	case 'demanderModifierPegi': {
		$idPegiModif = $_POST['txtIdPegi']; // sert à créer un formulaire de modification pour ce Pegi
		break;
	}

	case 'validerModifierPegi': {
		$db->modifierPegi($_POST['txtIdPegi'], $_POST['txtLibPegi']);
		$idPegiModif = $_POST['txtIdPegi']; // $idPegiNotif est l'idPegi du Pegi modifié
		$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
		break;
	}

	case 'supprimerPegi': {
		$idPegi = $_POST['txtIdPegi'];
		$db->supprimerPegi($_POST['txtIdPegi']); //  à vérifier, voir quelle méthode appeler dans le modèle
		break;
	}
	case 'afficherDesc': {
		$idPegi = $_POST['txtIdPegi'];
		$db->getDescrption($_POST['txtIdPegi']); //  à vérifier, voir quelle méthode appeler dans le modèle
		break;
	}

	case 'ajouterDesc': {
		if (!empty($_POST['txtLibPegi'])) {
			$idPegiNotif = $db->ajouterPegi($_POST['txtLibPegi']);
			// $idPegiNotif est l'id Pegi du Pegi ajouté
			$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
		}
		break;
	}
}

// l' affichage des Pegis se fait dans tous les cas	
$tbPegi = $db->getLesPegis();
require 'vue/v_lesPegis.php';

?>