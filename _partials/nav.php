    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Accueil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

          <?php if (!isset($_SESSION['user_id']) && !isset($_SESSION['pseudo'])) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="?page=register">Inscription <span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="?page=login">Connexion</a>
            </li>

          <?php } else { ?>

            <li class="nav-item">
              <a class="nav-link" href="?page=modif_mdp">Modification mdp</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=deconnexion">Déconnexion</a>
            </li>
          <?php } //on doit tjr ouvrir et fermer pour que html ne s'affiche que qd il repond a la condition 
          ?>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>