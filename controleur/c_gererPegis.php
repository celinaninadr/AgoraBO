	<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les genres
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])) {
		 $action = 'afficherPegis';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$idPegiModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action) {

		case 'ajouterNouveauPegi': {		
			if (!empty($_POST['txtAgeLimite'])) {
				$idPegiNotif = $db->ajouterPegi($_POST['txtAgeLimite']);
				// $idPegiNotif est l'idGenre du genre ajouté
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		  break;
		}

		case 'demanderModifierPegi': {
				$idPegiModif = $_POST['txtIdPegi']; // sert à créer un formulaire de modification pour ce genre
			break;
		}
			
		case 'validerModifierPegi': {
			$db->modifierPegi($_POST['txtIdPegi'], $_POST['txtAgeLimite']); 
			$idPegiNotif = $_POST['txtIdGenre']; // $idGenreNotif est l'idPegi du pegi modifié
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerPegi': {
			$idPegi = $_POST['txtIdPegi'];
			$db-> supprimerPegie($_POST['txtIdPegi']); //  à vérifier, voir quelle méthode appeler dans le modèle
			break;
		}
	}
		
	// l' affichage des genres se fait dans tous les cas	
	$tbPegis  = $db->getLesPegis();		
	require 'vue/v_lesPegis.php';

	?>
