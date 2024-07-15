<h2>Créer une nouvelle pages :</h2>
<pre>
    Toutes les pages créées ont automatiquement pour extension '.php', pas besoin d'indiquer d'extension dans le nom du fichier.
Les noms de fichier ne peuvent contenir que des lettres simples, pas de chiffres, de symboles ni de caractères spéciaux. Ceux-ci seront automatiquement retirés.
</pre>
<form method="post">
    <div class='form-group'>
        <label for='fname'>Nom du fichier</label>
        <input id='fname' name='fname' type='text' size='50' placeholder="Entrez un nom pour votre page..." class='form-control' />
    </div>
    <div class='form-group'>
        <label for='fcode'>Code du fichier</label>
        <textarea id='fcode' name='fcode' col='50' row='8' placeholder="Entrez le code de votre page..." class='form-control'></textarea>
    </div>
    <input class="btn btn-success" type="submit" name="btCreate" value="Enregistrer" />
    <input class="btn btn-warning" type="button" name="annuler" value="Annuler" onclick="history.back()" />
</form>