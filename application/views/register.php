<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href=<?php echo site_url("assets/bootstrap/all.min.css"); ?>>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=<?php echo site_url("assets/css/style2.css"); ?>>
</head>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" autocomplete="off" action=<?php echo site_url("traitement/inscription"); ?>>
        <b><h3>Sign Here</h3></b>

        <label for="username">Nom</label>
        <input type="text" placeholder="Entrer votre nom" id="username" name="nom" required>

        <label for="lastname">Prenom</label>
        <input type="text" placeholder="Entrer votre prenom" id="lastname" name="prenom" required>

        <label for="email">Email</label>
        <input type="email" placeholder="Entrer votre email" name="email" id="email" required>

        <label for="dtn">Date de naissance</label>
        <input type="date" placeholder="Votre date de naissance" name="date_naissance">

        <label for="password">Password</label>
        <input type="password" placeholder="Entrer votre mot de passe" id="password" name="mdp" required>

        <button>Sign In</button>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
        <p>Avez_vous une compte?<a href="index">Log</a></p>
    </form>
</body>
</html>