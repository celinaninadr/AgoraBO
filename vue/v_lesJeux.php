<?php
$tbGenres = $db->getLesGenres();
$tbMarques = $db->getLesMarques();
$tbPegis = $db->getLesPegis();
$tbPlateformes = $db->getLesPlateformes();
?>

<!-- Page Start -->
<div class="col-sm-6">
    <section class="panel">
        <div class="chat-room-head">
            <h3><i class="fa fa-angle-right"></i> Gerer les jeux</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> Identifiant</th>
                        <th><i class="fa fa-tag"></i> Nom</th>
                        <th><i class="fa fa-certificate"></i> Marque</th>
                        <th><i class="fa "></i> Genre</th>
                        <th><i class="fa "></i> Plateforme</th>
                        <th><i class="fa "></i> Pegi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Formulaire pour ajouter un nouveau Jeu -->
                    <tr>
                    <form action="index.php?uc=gererJeux" method="post">
                        <td>
                            <input type="text" id="txtRefJeu" name="txtRefJeu" size="24" required placeholder="Référence" title="Référence du jeu" />
                        </td>
                        <td>
                            <input type="text" id="txtNomJeu" name="txtNomJeu" size="24" required minlenght="4" maxlength="256" placeholder="Nom" title="De 4 à 24 caractères" />
                        </td>
                        <td>
							<select id="txtMarqueJeu" name="txtMarqueJeu" required>
                                <option value="">-- Choisir une marque --</option>
                                <?php foreach ($tbMarques as $marque) { ?>
                                    <option value="<?php echo htmlspecialchars($marque->libelle); ?>">
                                        <?php echo htmlspecialchars($marque->nom); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select id="txtGenreJeu" name="txtGenreJeu" required>
                                <option value="">-- Choisir un genre --</option>
                                <?php foreach ($tbGenres as $genre) { ?>
                                    <option value="<?php echo htmlspecialchars($genre->libelle); ?>">
                                        <?php echo htmlspecialchars($genre->libelle); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select id="txtPlateformeJeu" name="txtPlateformeJeu" required>
                                <option value="">-- Choisir une plateforme --</option>
                                <?php foreach ($tbPlateformes as $plateforme) { ?>
                                    <option value="<?php echo htmlspecialchars($plateforme->libelle); ?>">
                                        <?php echo htmlspecialchars($plateforme->libelle); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select id="txtPegiJeu" name="txtPegiJeu" required>
                                <option value="">-- Choisir un Pegi --</option>
                                <?php foreach ($tbPegis as $pegi) { ?>
                                    <option value="<?php echo htmlspecialchars($pegi->libelle); ?>">
                                        <?php echo htmlspecialchars($pegi->ageLimite); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauJeu" title="Enregistrer nouveau jeu"><i class="fa fa-save"></i></button>
                            <button class="btn btn-info btn-xs" type="reset" title="Effacer ma saisie"><i class="fa fa-eraser"></i></button>
                        </td>
                    </form>
                    </tr>

                    <?php
                    foreach ($tbJeux as $jeu){
                    ?>
                        <tr>

                            <!-- Formulaire pour modifier et supprimer les jeux -->
                            <form action="index.php?uc=gererJeux" method="post">
                                <td><?php echo $jeu->identifiant; ?><input type="hidden" name="txtRefJeu" value="<?php echo $jeu->identifiant; ?>" /></td>
                                <td><?php
                                    if ($jeu->identifiant != $refJeuModif) {
                                        echo $jeu->nom; 
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($jeu->identifiant != $refJeuModif) {
                                        echo $jeu->marque;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($jeu->identifiant != $refJeuModif) {
                                        echo $jeu->genre;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($jeu->identifiant != $refJeuModif) {
                                        echo $jeu->plateforme;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($jeu->identifiant != $refJeuModif) {
                                        echo $jeu->pegi;
                                    ?>
                                </td>
                                <td>
                                    <?php if ($notification != 'rien' && $jeu->identifiant == $refJeuModif) {
                                        echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'<button>';

                                    } ?>
                                    <button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierJeu" title="Modifier"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sx" type="submit" name="cmdAction" value="supprimerJeu" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce jeu?');"><i class="fa fa-trash-o "></i></button>
                                </td>
                                <?php
                                }
                                }
                                }
                                }
                                }
                                else {
                                    ?><input type="text" id="txtNomJeu" name="txtNomJeu" size="24" required minlength="4" maxlength="24" value="<?php echo htmlspecialchars($jeu->nom); ?>" />
                                    </td>
                                    <td>
                                        <select id="txtMarqueJeu" name="txtMarqueJeu" required>
                                            <option value="">-- Choisir une marque --</option>
                                            <?php foreach ($tbMarques as $marque) { ?>
                                                <option value="<?php echo htmlspecialchars($marque->libelle); ?>">
                                                    <?php echo htmlspecialchars($marque->libelle); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select id="txtGenreJeu" name="txtGenreJeu" required>
                                            <option value="">-- Choisir un genre --</option>
                                            <?php foreach ($tbGenres as $genre) { ?>
                                                <option value="<?php echo htmlspecialchars($genre->libelle); ?>" <?php if ($genre->libelle == $jeu->genre) echo 'selected'; ?>>
                                                    <?php echo htmlspecialchars($genre->libelle); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select id="txtPlateformeJeu" name="txtPlateformeJeu" required>
                                            <option value="">-- Choisir une plateforme --</option>
                                            <?php foreach ($tbPlateformes as $plateforme) { ?>
                                                <option value="<?php echo htmlspecialchars($plateforme->libelle); ?>">
                                                    <?php echo htmlspecialchars($plateforme->libelle); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select id="txtPegiJeu" name="txtPegiJeu" required>
                                            <option value="">-- Choisir un Pegi --</option>
                                            <?php foreach ($tbPegis as $pegi) { ?>
                                                <option value="<?php echo htmlspecialchars($pegi->libelle); ?>">
                                                    <?php echo htmlspecialchars($pegi->libelle); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierJeu" title="enregistrer"><i class="fa fa-save"></i></button>
                                        <button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>
                                        <button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierJeu" title="Annuler"><i class="fa fa-undo"></i></button>
                                    </td>
                                <?php
                                }
                                ?>
                            </form>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </section>
</div>