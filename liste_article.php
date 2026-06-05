<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Liste des articles</title>

<style>
body{
    font-family:Arial;
    margin:0;
    background:#f4f6f8;
}

header{
    background:#1e3c72;
    color:white;
    padding:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.btn{
    text-decoration:none;
    color:white;
    padding:10px 15px;
    border-radius:5px;
    font-weight:bold;
}

.ajouter{
    background:green;
}

.quitter{
    background:red;
}

table{
    width:90%;
    margin:20px auto;
    border-collapse:collapse;
    background:white;
}

th{
    background:#2a5298;
    color:white;
}

th,td{
    border:1px solid #ccc;
    padding:10px;
    text-align:center;
}

.modifier{
    background:orange;
    color:white;
    text-decoration:none;
    padding:5px 10px;
    border-radius:5px;
}
</style>

</head>
<body>

<header>

<a href="home.php" class="btn quitter">Quitter</a>

<h2>Liste des articles</h2>

<a href="ajouter_article.php" class="btn ajouter">Ajouter</a>

</header>

<table>

<tr>
    <th>Code Article</th>
    <th>Description</th>
    <th>Prix (FCFA)</th>
    <th>Catégorie</th>
</tr>

<?php

$result = $conn->query("SELECT * FROM article");

while($row = $result->fetch_assoc()){

echo "<tr>

<td>".$row['id_article']."</td>

<td>".$row['design']."</td>

<td>".$row['prix']."</td>

<td>".$row['categorie']."</td>
</tr>";

}
?>

</table>

</body>
</html>