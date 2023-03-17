<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Css/authentification.css" rel="stylesheet">
    <style type="text/css">a:link{text-decoration:none}</style>
    <title>Authentification</title>    
</head>
<body>
    <header>
        <li><a href="index.php" style="color:black;">Accueil</a></li>
    </header>

    <div id="registration-title" class="registration-title">
        <h2>Inscription</h2>
    </div>

    <div class="reg-div" id="reg-div">
        <form id="registration" class="registration" method="post">
            <input type="text" placeholder="Pseudo" name="pseudo" autocomplete="off"><br>
            <input type="email" placeholder="Email" name="email" autocomplete="off"><br>
            <input type="password" placeholder="Mot de passe" name="mdp" autocomplete="off"><br>
            <input type="password" placeholder="Confirmation de mot de passe" name="confirmed-mdp" autocomplete="off"><br>
            <input type="submit" value="Inscription">
            <div id="already-subscribed" class="already-subscribed">
                Déjà inscrit ? Connectez-vous
                <div id="connexion-btn" class="connexion-btn">
                    ici
                </div>
            </div>
            <div id="reg-message" class="reg-message">
        
            </div>
        </form>
    </div>

    <div id="connexion-title" class="connexion-title">
        <h2>Connexion</h2>
    </div>
    
    <div class="log-div" id="log-div">
        <form id="connexion" class="connexion" method="post">
            <input type="text" placeholder="Pseudo" name="log-pseudo" autocomplete="off"><br>
            <input type="password" placeholder="Mot de passe" name="log-mdp" autocomplete="off"><br>
            <input type="submit" value="Connexion">
            <div id="not-subscribed" class="not-subscribed">
                Pas encore inscrit ? Enregistrez-vous
                <div id="registration-btn" class="registration-btn">
                    ici
                </div>
            </div>
            <div id="log-message" class="log-message">

            </div>
        </form>
    </div>


    <script src="authentification.js"></script>
</body>
</html>