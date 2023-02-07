
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>App Store Website Template | Smarteyeapps.com</title>
        <link rel="shortcut icon" href=<?php echo site_url("assets/images/fav.png"); ?>  type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <link rel="shortcut icon" href=<?php echo site_url("assets/images/fav.jpg"); ?>>
        <link rel="stylesheet" href=<?php echo site_url("assets/css/bootstrap.min.css"); ?>>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href=<?php echo site_url("assets/css/gestion_categorie.css"); ?> />
    </head>
        <?php
        require_once('header_hafa.php');
        ?>

           <div class="section-container p-2 p-xl-4">
        
                <h4 class="fs-6 fw-bolder my-3 mt-2 mb-4">Tous les listes d'Objet<a class="float-end text-primary text-decoration-underline" href=""><small class="fs-8">View All</small></a></h4>
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
                                        <span class="mb-0 fs-6"><a href="#">Modifier</a></span>
                                        <span class="mb-0 fs-6"><a href="#">Supprimer</a></span>
                                        <span class="mb-0 fs-6"><a href=<?php echo site_url("loader/apercu/".$obj["idObjet"]); ?>>Aperçue</a></span>
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