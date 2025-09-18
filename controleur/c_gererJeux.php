<?php
// si le paramètre action n'est pas positionné alors
//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les jeux
//		sinon l'action est celle indiquée par le bouton

if (!isset($_POST['cmdAction'])) {
    $action = 'afficherJeux';
}
else {
    // par défaut
    $action = $_POST['cmdAction'];
}

$refJeuModif = -1;		// positionné si demande de modification
$notification = 'rien';	// pour notifier la mise à jour dans la vue
$refJeuNotif = -1;      // pour identifier le jeu à notifier

// selon l'action demandée on réalise l'action 
switch($action) {

    case 'ajouterNouveauJeu': {		
        if (!empty($_POST['txtNomJeu'])) {
            $refJeuNotif = $db->ajouterJeu(
                $_POST['txtRefJeu'],
                $_POST['txtNomJeu'],
                $_POST['txtMarqueJeu'] ?? '',
                $_POST['txtGenreJeu'] ?? '',
                $_POST['txtPlateformeJeu'] ?? '',
                $_POST['txtPegiJeu'] ?? 0,
                $_POST['txtPrixJeu'] ?? 0,
                $_POST['txtDateJeu'] ?? ''
            );
            // $refJeuNotif est la référence du jeu ajouté
            $notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
        }
      break;
    }

    case 'demanderModifierJeu': {
        $refJeuModif = $_POST['txtRefJeu']; // sert à créer un formulaire de modification pour ce jeu
        break;
    }
        
    case 'validerModifierJeu': {
        $db->modifierJeu(
            $_POST['txtRefJeu'] ?? '',
            $_POST['txtNomJeu'] ?? '',
            $_POST['txtMarqueJeu'] ?? '',
            $_POST['txtGenreJeu'] ?? '',
            $_POST['txtPlateformeJeu'] ?? '',
            $_POST['txtPegiJeu'] ?? ''
        );
        $refJeuNotif = $_POST['txtRefJeu'] ?? '';
        $notification = 'Modifié';
        break;
    }

    case 'annulerModifierJeu': {
        $refJeuModif = -1; // Annule la modification
        break;
    }

    case 'supprimerJeu': {
        $refJeu = $_POST['txtRefJeu'];
        $db->supprimerJeu($_POST['txtRefJeu']);
        break;
    }
}
    
// l'affichage des jeux se fait dans tous les cas	
$tbJeux = $db->getLesJeux();		
require 'vue/v_lesJeux.php';

?>