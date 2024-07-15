<h2>Liste des pages :</h2>
<p><a class="btn btn-primary" href="<?= hlien("nouveau", "create") ?>">Créer une nouvelle page</a></p>
<?php
foreach ($files as $name) { ?>
    <p><a href='<?= hlien("nouveau", $name) ?>'><?= $name ?></a></p>
<?php } ?>