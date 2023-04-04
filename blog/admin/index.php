<?php 
session_start();
if (!$_SESSION) {
  header("location:include/warning.php");
} 
?>
<?php 
require("../refactoring.php");
$parpage = 5;
$nombreTotal = pargination();

$noPage =1;
$pages = ceil($nombreTotal/$parpage);
  if(isset($_GET['page'])){
    $noPage = $_GET['page'];
  }
$posts = selectAll($noPage, $parpage);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../css/style.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../css/admin.css">

        <title>Section Admin - Gestions des articles</title>
    </head>

    <body>
        <!-- page header -->
    <?php require("include/header-admin.php") ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-container">

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn btn-big">Ajouter un article</a>
                </div>
                <div class="container">
                    <h2 class="page-title">Gérer les articles</h2>
                    <table>
                        <head>
                            <th>SN</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th colspan="3">Action</th>
                        </head>
                        <body>
                            <?php foreach($posts as $key=>$post):?>
                       
                                <tr>
                                    <td><?= $key + 1;?></td>
                                    <td><?= $post['title'] ?></td>
                                    <td><?= $post['author'] ?></td>
                                    <td><a href="edit.php?id=<?php echo $post['id']?>" class="edit">Modifier</a></td>
                                    <td><a href="edit.php?delete_id=<?= $post['id']?>" class="delete">Supprimer</a></td>  
                                </tr>
                            
                            <?php endforeach; ?>
                        </body>
                    </table>
                </div>
            </div>
        </div>
        <!-- page footer -->
        <!-- pargination -->
    <div class="pagination">
      <?php 
      for($i=1; $i<=$pages; $i++){ ?>
      <a href="index.php?page=<?= $i ?>" class="page <?= ($noPage == $i)?'active':'' ?>"><?= $i ?></a>

    <?php
      }
      ?>

    </div>
        <?php require("../include/footer.php") ?>
        


    </body>

</html>