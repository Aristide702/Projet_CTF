        <h2>Connexion</h2>
        <form method="post">            
            <div class='form-group'>
                <label for='uti_login'>login</label>
                <input id='uti_login' name='uti_login' type='text' size='50' value='<?= mhe($uti_login) ?>' class='form-control' />
            </div>
            <div class='form-group'>
                <label for='uti_mdp'>Mot de passe</label>
                <input id='uti_mdp' name='uti_mdp' type='password' size='50' value='' class='form-control' />
            </div>            
            <input class="btn btn-success" type="submit" name="btSubmit" value="Enregistrer" />
        </form>