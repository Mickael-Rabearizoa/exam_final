<!doctype html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>liste Objets utilisateurs</title>
        <link rel="shortcut icon" href=<?php echo site_url("assets/images/fav.png"); ?> type="image/x-icon">
        <link rel="shortcut icon" href=<?php echo site_url("assets/images/fav.jpg"); ?>>
        <link rel="stylesheet" href=<?php echo site_url("assets/css/bootstrap.min.css"); ?>>
        <link rel="stylesheet" type="text/css" href=<?php echo site_url("assets/css/gestion_categorie.css"); ?> />
        <link rel="stylesheet" href=<?php echo site_url("assets/fontawesome-5/css/all.css"); ?>>
    </head>
    <header class="head">
        <div class="logo border-bottom">
            <span class="blue size-xxlarge text-logo">Takalo</span>
            <span class="orange size-xxlarge text-logo">-Takalo</span>
            
            <a class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </a>
        </div>
        <div id="navbarNav" class="navcol pt-0 d-none d-lg-block">
            <ul>
                <?php
                    foreach($categories as $categorie){
                ?>
                        <li class="border-bottom"><a href=<?php echo site_url("loader/filtre/".$categorie["idCategorie"]."/objet_utilisateur"); ?>><?php echo $categorie["nomCategorie"]; ?></a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </header>
        <?php
        require_once('header_hafa.php');
        ?>

           <div class="section-container p-2 p-xl-4">
        
                <h4 class="fs-6 fw-bolder my-3 mt-2 mb-4">Tous les listes d'Objet</h4>
                <div class="row m-0">
                <?php
                    foreach($objet as $obj){
                ?>
                        <div class="col-md-4 mb-3">
                        <div class="app-cover p-2 shadow-md bg-white">
                            <div class="row">
                                <div class="img-cover pe-0 col-3"> <img class="rounded" src=<?php echo site_url($obj["pathImage"]); ?> alt=""></div>
                                    <div class="det mt-2 col-9" style="float: right;">
                                        <h4 class="mb-0 fs-6"><?php echo $obj["nomObjet"]; ?></h4>
                                        <br>
                                        <div class="mb-0 fs-6 btn button-objet"><a href=<?php echo site_url("loader/modif_objet/".$obj["idObjet"]); ?>>Modifier</a></div>
                                        <div class="mb-0 fs-6 btn button-objet"><a href=<?php echo site_url("traitement/traitement_suppression/".$obj["idObjet"]); ?>>Supprimer</a></div>
                                        <div class="mb-0 fs-6 btn button-objet"><a href=<?php echo site_url("loader/apercu/".$obj["idObjet"]); ?>>Aper??ue</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>              
                <?php
                    }

                ?>
                </div>
                    
            </div>
           </div>
        </div>
        
    <body>
</body>

<script src=<?php echo site_url("assets/js/jquery-3.2.1.min.js"); ?>></script>
<script src=<?php echo site_url("assets/js/popper.min.js"); ?>></script>
<script src=<?php echo site_url("assets/js/bootstrap.bundle.min.js"); ?>></script>
<script src=<?php echo site_url("assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"); ?>></script>
<script src=<?php echo site_url("assets/plugins/testimonial/js/owl.carousel.min.js"); ?>></script>
<script src=<?php echo site_url("assets/js/script.js"); ?>></script>

</html>