    <h2>plat</h2>
    <form method="post">
    	<div class='form-group'>
    		<label for='chercheplat'>Rechercher un plat</label>
    		<input id='chercheplat' name='chercheplat' type='text' size='50' value='<?= mhe($chercheplat) ?>' class='form-control' />
    	</div>
    	<input class="btn btn-success" type="submit" name="btChercher" value="Rechercher" />
    </form>
    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>pla_id</th>
    			<th>pla_nom</th>
    			<th>pla_calorie</th>
    			<th>pla_prix</th>
    			<th>modifier</th>
    			<th>supprimer</th>
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