	<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les genres
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])) {
		 $action = 'afficherPlateformes';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$idPlateformeModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action) {

		case 'ajouterNouvellePlateforme': {		
			if (!empty($_POST['txtNomPlateforme'])) {
				$idPlateformeNotif = $db->ajouterPlateforme($_POST['txtNomPlateforme']);
				// $idPlateformeNotif est l'idPlateforme du plateforme ajouté
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		  break;
		}

		case 'demanderModifierPlateforme': {
				$idPlateformeModif = $_POST['txtIdPlateforme']; // sert à créer un formulaire de modification pour ce plateforme
			break;
		}

		case 'validerModifierPlateforme': {
			$db->modifierPlateforme($_POST['txtIdPlateforme'], $_POST['txtNomPlateforme']); 
			$idPlateformeNotif = $_POST['txtIdPlateforme']; // $idPlateformeNotif est l'idPlateforme du plateforme modifié
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerPlateforme': {
			$idPlateforme = $_POST['txtIdPlateforme'];
			$db->supprimerPlateforme($_POST['txtIdPlateforme']); //  à vérifier, voir quelle méthode appeler dans le modèle
			break;
		}
	}
		
	// l' affichage des plateformes se fait dans tous les cas	
	$tbPlateformes  = $db->getLesPlateformes();		
	require 'vue/v_lesPlateformes.php';

	?>
