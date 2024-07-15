<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</span></a>
        </li>
        <li><a class='nav-link' href='<?= hlien("crustace", "index") ?>'>Liste des crustacés</a></li>
        <?php if ($_SESSION["uti_role"] == 1) { ?>
          <li><a class='nav-link' href='<?= hlien("utilisateur", "index") ?>' enable>Utilisateur</a></li>
          <li><a class='nav-link' href='<?= hlien("nouveau", "index") ?>'>Créer page</a></li>
        <?php } else { ?>
          <li><a class='nav-link' role="link" aria-disabled="true">Utilisateur</a></li>
        <?php } ?>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION["uti_id"])) { ?>
          <li><a class="nav-link" href="<?= hlien("authentification", "deconnexion") ?>">Déconnexion</a></li>
        <?php } else { ?>
          <li><a class="nav-link" href='<?= hlien("authentification", "connexion") ?>'>Connexion</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>