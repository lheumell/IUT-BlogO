<?php

require_once '../includes/config.php';
$pt = new PostTable();

$id = $_GET['id'];

$getId = $pt->get($id);

if (!empty($_POST['modifier'])){
    if(!empty($_POST['title'] && !empty($_POST['content']))) {

        $post = new Post();
        $post->setTitle($_POST['title']);
        $post->setContent($_POST['content']);
        $post->setId($id);
        $pt->update($post);

        header('location:index.php');

    }
}

  
?>

<html>
    
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


<title>Blog</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
   
    <form method="POST">
        <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4">
                <label for="title">Title</label><br>
                <input type="text" name="title" value="<?= $getId->getTitle()?>"> <br>       
                <label for="content">Content</label><br>
                <textarea name="content" id="content" cols="50" rows="5"><?= $getId->getContent()?></textarea><br>
                <input type="submit" id="modifier" name="modifier" value="modifier">
            </div>
        </div>
    </form>
    </body>
</html>