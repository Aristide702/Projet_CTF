    <h2>crustace</h2>
    <p><a class="btn btn-primary" href="<?= hlien("crustace", "edit", "id", 0) ?>">Nouveau crustace</a></p>
    <form method="post">
    	<div class='form-group'>
    		<label for='crustaceNom'>Rechercher un crustacé</label>
    		<input id='crustaceNom' name='crustaceNom' type='text' size='50' value='<?= mhe($crustaceNom) ?>' class='form-control' />
    	</div>
    	<input class="btn btn-success" type="submit" name="btChercher" value="Rechercher" />
    </form>
    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>

    			<th>Nom du crustacé</th>
    			<th>Nom latin de l'espèce</th>
    			<th>Description</th>
    			<th>Image</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
			foreach ($data as $row) { ?>
    			<tr>
    				<?php foreach ($row as $valeur) { ?>
    					<td><?= mhe($valeur) ?></td>
    				<?php } ?>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>