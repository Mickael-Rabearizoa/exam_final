<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>getion categorie</title>
        <link rel="shortcut icon" href=<?php echo site_url("assets/images/fav.png"); ?>  type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <link rel="shortcut icon" href=<?php echo site_url("assets/images/fav.jpg"); ?>>
        <link rel="stylesheet" href=<?php echo site_url("assets/bootstrap/bootstrap.min.css"); ?> >
        <link rel="stylesheet" href=<?php echo site_url("assets/bootstrap/all.min.css"); ?>>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href=<?php echo site_url("assets/css/gestion_categorie.css"); ?> />
        <style>
            .formulaire input{
                width: 45%;
            }
            .formulaire{
                margin-left: 20%;
                padding: 2%;
                width: 55%;
            }
            hr{
                width: 30%;
                size: 10;
                color: rgb(235, 104, 10);
            }
        </style>
    </head>
        <?php
        require_once('header_admin.php');
        ?>
           <div class="section-container p-2 p-xl-4">
        
                <h4 class="fs-6 fw-bolder my-3 mt-2 mb-4">Tous les listes de categorie  <a class="float-end text-primary text-decoration-underline" href=""><small class="fs-8">View All</small></a></h4>
    
                <div class="row m-0">
                    <?php
                        foreach($categories as $categorie){
                    ?>
                        <div class="col-md-4 mb-3">
                        <div class="app-cover p-2 shadow-md bg-white">
                            <a href="#">
                                <div class="row">
                                    <div class="img-cover pe-0 col-3"> <img class="rounded" src=<?php echo site_url($categorie["pathImage"]); ?>  alt=""></div>
                                        <div class="det mt-2 col-9">
                                            <h5 class="mb-0 fs-6"><?php echo $categorie["nomCategorie"]; ?></h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        }
                    ?>

            </div>
           </div>
        </div>
            <hr>
        <div class="formulaire border border-3">
            <form action=<?php echo site_url("traitement/ajout_categorie"); ?> method="get">
                <h1>Ajouter de categorie</h1>
                <div class="mb-3 row">
                    <label for="nom_categ" class="col-sm-2 col-form-label">Nom de categorie :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom_categ" name="categorie">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Valider</button>
            </form>
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