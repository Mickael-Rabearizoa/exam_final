<div  class="main-content">
   <div class="nav-bar sticky-top-xl bg-white shadow-sm w-100 p-3">
       <div class="row">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item margin-right size-large">
                      <a class="nav-link active" aria-current="page" href=<?php echo site_url("loader/objet_utilisateur"); ?>>Acceuil</a>
                    </li>
                    <li class="nav-item margin-right size-large">
                    <a class="nav-link " href=<?php echo site_url("loader/ajout_objet"); ?>>Ajouter objet</a>
                  </li>
                  <li class="nav-item margin-right size-large">
                    <a class="nav-link " href=<?php echo site_url("loader/listes_utilisateurs"); ?>>Utilisateurs</a>
                  </li>
                  <li class="nav-item margin-right size-large">
                    <a class="nav-link " href=<?php echo site_url("loader/listes_propositions_fait"); ?>>Propositions envoyé</a>
                  </li>
                  <li class="nav-item margin-right size-large">
                    <a class="nav-link " href=<?php echo site_url("loader/listes_propositions_recus"); ?>>Propositions reçus</a>
                  </li>
                  <li class="nav-item size-large">
                    <a class="nav-link active" href="<?php echo site_url("traitement/log_out"); ?>">
                      LogOut
                    </a>
                </li>
                
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
           <div class="col-md-3"></div>
           
               
           
       </div>
   </div>