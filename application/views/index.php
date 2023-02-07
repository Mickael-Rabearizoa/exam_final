<?php
    $erreur_compte = "'Entrer votre email'";
    $erreur_mdp = "'Entrer votre mot de passe'";
    if(isset($erreur)){
        if($erreur == 1){
            $erreur_compte = "'compte innexistante!'";
        }
        if($erreur == 2){
            $erreur_mdp = "'mot de passe incorrect!'";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login Page</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href=<?php echo site_url("assets/bootstrap/all.min.css"); ?>>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=<?php echo site_url("assets/css/style.css"); ?>>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div style="padding: 20px">
    <form action=<?php echo site_url("traitement/traitement_login"); ?> method="post">
        <b><h3>Login Here</h3></b>
        <?php
            if(isset($erreur)){
        ?>
                <label for="email">Email</label>
                <input type="email" placeholder=<?php echo $erreur_compte; ?>  id="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" placeholder=<?php echo $erreur_mdp; ?> id="password" name="mdp">
        <?php
            }else{
        ?>
        <label for="email">Email</label>
        <input type="email" placeholder="Entrer votre email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Entrer votre mot de passe" id="password" name="mdp">
        <?php
            }
        ?>

        <button>Log In</button>
        
        <button><a style="color: BLACK;" href="loader/admin">Connecter en Administrateur</a></button>

        <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
        
        <b>Vous n'avez pas de compte?</b>

        <button><a style="color: BLACK;" href="loader/register">Sign in</a></button>
    </form>

    </div>
</body>
</html>
