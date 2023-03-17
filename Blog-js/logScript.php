<?php 
// echo json_encode($_POST);
session_start();
$success = 0;
$msg = "Une erreur est survenue (script.php)";

if (!empty($_POST['log-pseudo']) AND !empty($_POST['log-mdp']))
    {
        $logPseudo = htmlspecialchars((strip_tags($_POST['log-pseudo'])));
        $logMdp = htmlspecialchars((strip_tags($_POST['log-mdp'], PASSWORD_DEFAULT)));
                
        if (strlen($logPseudo) < 25) 
        {
            if (strlen($logMdp) < 25) 
            {
                require_once('require/connexion_db.php');
                $req = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE login = '$logPseudo' AND password = '$logMdp'"); 
                $num_rows = mysqli_num_rows($req); // Compter le nombre de ligne ayant rapport a la requette SQL
                if ($num_rows > 0 AND $success == null)
                {   
                    $_SESSION['loggedin'] = true;
                    $_SESSION['logUsername'] = $logPseudo; 
                    $_SESSION['id'] = $row['id'];
                    header("location:profil.php");
                } else if ($num_rows > 0 AND $success == null){
                    $msg = "<p style='color:red'>Login et/ou mot de passe incorrect/s</p></div>";
                }
            } else {
                    $msg = "<p style='color:red'> Votre mot de passe ne peut pas dépasser 25 caractères </p>";    
            }
        } else {
                $msg = "<p style='color:red'> Votre pseudo ne peut pas dépasser 25 caractères </p>";
        }
    } else {
        $msg = "<p style='color:red'> Veuillez renseigner tous les champs </p>";
    }

$res = ["success" => $success, "msg" => $msg];
echo json_encode($res);
?>