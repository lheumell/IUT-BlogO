<?php
session_start() ;
require_once '../includes/config.php';

$pt = new PostTable();

if (isset($_POST['title']) && isset($_POST['content'])) {
    $post = new Post();
    $post->setTitle($_POST['title']);
    $post->setContent($_POST['content']);
    $pt->create($post);
}

if(!empty(($_GET['id']))){
    $getid = intval($_GET['id']);
    $pt->delete($getid);
    header('location:index.php');
}

if(!empty($_GET['deco'])){
    session_destroy();
    header('location:index.php');
}

$posts = $pt->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mini-Blog</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<a class="nav-link" href="connexion.php">Connexion</a>
<a class="nav-link"  href="inscription.php">Inscription</a>
<a class="nav-link" name="deco" href="index.php?deco=1" >Deconnexion</a>
<?php if(!empty($_SESSION['id'])){ ?>
<p>Vous êtes connecté en tant que <?= $_SESSION['nom']  ?></p>
<?php }?>

    <div class="container">
        <h1 class="text-center">Blog</h1>
        <div class="row">
            <?php foreach($posts as $post): ?>
                <div class="col-md-4">
                    <h2><?= $post['title'] ?></h2>
                    <p><?= $post['content'] ?></p>
                    <a href="modifier.php?id= <?= $post['id'] ?>" class="btn btn-elegant">Modifier</a>
                    <a href="index.php?id=<?= $post['id'] ?>" class="btn btn-elegant">Supprimer</a>
                    <p class="text-center"><a href="recuperer.php?id= <?= $post['id'] ?>" class="btn btn-elegant">Afficher</a></p>
                </div>
            <?php endforeach; ?>
        </div>
        <h1>Add a Post</h1>
        <div class="row">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="title">Content</label>
                    <textarea class="form-control" name="content"></textarea>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>

     <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>
