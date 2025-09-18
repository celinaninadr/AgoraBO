<!-- page start-->
<div class="col-sm-6">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les pegis</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> Identifiant</th>
				<th><i class="fa fa-bookmark"></i> Age Limite</th>
                <th><i class="fa fa"></i> Description</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			<!-- formulaire pour ajouter un nouveau pegi -->
			<tr>
			<form action="index.php?uc=gererPegis" method="post">
				<td>Nouveau</td>
				<td>
					<input type="text" id="txtAgeLimite" name="txtAgeLimite" size="24" required minlength="4"  maxlength="24"  placeholder="Age Limite" title="De 4 à 24 caractères"  />
				</td>
                <td>
                    <input type="text" id="txtDescription" name="txtDescription" size="24" required minlength="4"  maxlength="256"  placeholder="Description" title="De 4 à 24 caractères"  />
                </td>
				<td> 
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauPegi" title="Enregistrer nouveau pegi"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>
			</form>
			</tr>
				
			<?php
			foreach ($tbPegis as $pegi) { 
			?>
			  <tr>
			  
				<!-- formulaire pour modifier et supprimer les pegis -->
				<form action="index.php?uc=gererPegis" method="post">
				<td><?php echo $pegi->identifiant; ?><input type="hidden"  name="txtIdPegi" value="<?php echo $pegi->identifiant; ?>" /></td>
				<td><?php 
					if ($pegi->identifiant != $idPegiModif) {
						echo $pegi->ageLimite;
						?>
				</td>
                <td>
                    <?php
                        if ($pegi->identifiant != $idPegiModif) {
                            echo $pegi->description;
                        }
                    ?>
                </td>
                        <td>
							<?php if ($notification != 'rien' && $pegi->identifiant == $idPegiNotif) {  
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>' . $notification . '</button>'; 
							
							} ?>
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierPegi" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerPegi" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce pegi?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?><input type="text" id="txtAgeLimite" name="txtAgeLimite" size="24" required minlength="4"  maxlength="24"   value="<?php echo $pegi->ageLimite; ?>" />     
						</td>
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierPegi" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierPegi" title="Annuler"><i class="fa fa-undo"></i></button>
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
			  	  
		</div><!-- fin div panel-body-->
    </section><!-- fin section genres-->
</div><!--fin div col-sm-6-->

