<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Page | Listes des Utilisateurs</title>
        <link rel="shortcut icon" href=<?php echo site_url("assets/images/fav.png"); ?> type="image/x-icon">
        <link rel="shortcut icon" href=<?php echo site_url("assets/images/fav.jpg"); ?>>
        <link rel="stylesheet" href=<?php echo site_url("assets/css/bootstrap.min.css"); ?>>
        <link rel="stylesheet" type="text/css" href=<?php echo site_url("assets/css/gestion_categorie.css"); ?> />
        <link href="<?php echo site_url("assets/fontawesome-5/css/all.css")?>">
    <title>Ajout objet</title>
    <style>
        .formulaire input{
            width: 45%;
        }
        .formulaire{
            margin-left: 20%;
            padding: 5%;
            width: 55%;
        }
    </style>
</head>
<body>
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
    
    <div class="formulaire border border-3">
        <form action=<?php echo site_url("traitement/traitement_ajout"); ?> method="get">
            <div class="mb-3 row">
                <label for="nom" class="col-sm-2 col-form-label">Nom de l'objet :</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" name="nom">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tarif" class="col-sm-2 col-form-label">Tarifs :</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="tarif" name="tarif">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="categ" class="col-sm-2 col-form-label">Categorie :</label>
                <div class="col-sm-10">
                <select name="categorie" >
                        <?php
                            foreach($categories as $categorie){
                        ?>
                                <option value=<?php echo $categorie["idCategorie"]; ?>><?php echo $categorie["nomCategorie"]; ?></option>
                        <?php
                                
                            }
                        ?>
                </select>
                <!-- <input type="text" class="form-control" id="categ" > -->
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description :</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
        </form>
    </div>
</body>
</html>