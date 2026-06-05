<?php include 'config.php'; ?>

<?php

if(isset($_POST['enregistrer'])){

    $id = $_POST['id_article'];
    $design = $_POST['design'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];

    $conn->query("INSERT INTO article
    VALUES('$id','$design','$prix','$categorie')");

    header("Location: liste_article.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Ajouter article</title>

<style>

body{
    background:#f4f6f8;
    font-family:Arial;
}

.formulaire{
    width:400px;
    margin:50px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

input{
    width:90%;
    padding:10px;
    margin:8px 0;
}

button{
    width:100%;
    padding:10px;
    background:green;
    color:white;
    border:none;
    border-radius:5px;
}

a{
    text-decoration:none;
}
</style>

</head>
<body>

<div class="formulaire">

<h2>Ajouter un article</h2>

<form method="POST">

<input type="text"
name="id_article"
placeholder="Code Article"
required>

<input type="text"
name="design"
placeholder="Description"
required>

<input type="number"
name="prix"
placeholder="Prix en FCFA"
required>

<input type="text"
name="categorie"
placeholder="Catégorie"
required>

<button name="enregistrer">
Enregistrer
</button>

</form>
<br><a href="liste_article.php">Retour à la liste</a>

</div>

</body>
</html>