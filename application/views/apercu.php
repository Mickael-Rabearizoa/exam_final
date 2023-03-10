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
        <style>
            .corps img{
                width: 50%;
            }
        </style>
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

           <div class="corps" >
        
                        <div class="row">
                        <?php
                            foreach($objet["images"] as $image){
                        ?>
                                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <div
                                class="bg-image hover-overlay ripple shadow-1-strong rounded"
                                data-ripple-color="light" style="width: 50%;"
                                >
                                <img
                                    src=<?php echo site_url($image["path"]); ?>
                                    class="w-100" width="500px" height="350px"
                                />
                                </div>
                        </div>
                        <?php
                            }
                        ?>
                      

                        <!-- <div class="col-lg-4 mb-4 mb-lg-0">
                            <div
                            class="bg-image hover-overlay ripple shadow-1-strong rounded"
                            data-ripple-color="light" style="width: 50%;"
                            >
                            <img
                                src="assets/images/books/2.png"
                                class="w-100"
                            />
                            
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <div
                            class="bg-image hover-overlay ripple shadow-1-strong rounded"
                            data-ripple-color="light" style="width: 50%;"
                            >
                            <img
                                src="assets/images/books/1.jpg"
                                class="w-100"
                            />
                            
                            </div>
                        </div> -->
                        </div>
  
  
                <!-- <div>
                    <img src="assets/images/books/1.jpg" class="rounded float-start" alt="tsisy">
                    <img src="assets/images/books/2.png" class="rounded float-end" alt="...">
                </div> -->
<br>
<hr>
                <div class="text" >
                    <h2>Details de l'objet :</h2>
                    <hr>
                            <div class="mb-3 row">
                                <b><label for="nom_categ" class="col-sm-2 col-form-label">Description : <p><?php echo $objet["description"]; ?></p></label></b>
                                <br>
                                <b><label for="nom_categ" class="col-sm-2 col-form-label">Prix estimatif : <p><?php echo $objet["prix_Estimatif"]; ?></p></label></b>
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