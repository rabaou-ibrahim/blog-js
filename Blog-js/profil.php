<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Css/profil.css" rel="stylesheet">
    <style type="text/css">a:link{text-decoration:none}</style>
    <title>Profil</title>    
</head>
<body>
    <header>
        <?php 
            session_start();       
            if (!isset($_SESSION) || !isset($_SESSION['logUsername'])){
                header('location:warning.php'); 
            }
            elseif ($_SESSION['loggedin'] = true) {
                echo ("<li><h4>Numéro identifiant : ".$_SESSION['id']." </h4></li>");
                echo ("<li><h4>Nom du login connecté : ".$_SESSION['logUsername']." </h4></li>");
            }
        ?>
    </header>

    <div class="bookmarks">
    
    </div>

    <div class="articles">

    </div>

    <div class="commentaires">
        
    </div>

</body>