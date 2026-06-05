<?php
include 'config.php';
session_start();

if(isset($_POST['valider'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['qte'] = $_POST['qte'];

    // vérifier client
    $client = $conn->query("
        SELECT * FROM client
        WHERE nom='$nom' AND prenom='$prenom'
    ");

    if($client->num_rows > 0){

        header("Location: traitement_vente.php");
        exit();

    } else {

        header("Location: nouveau_client.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Effectuer une vente</title>

    <style>
        body{
            margin:0;
            font-family:Arial;
            background:#f4f6f8;
        }

        header{
            background:#1e3c72;
            color:white;
            padding:15px;
            text-align:center;
        }

        .container{
            width:90%;
            margin:20px auto;
            background:white;
            padding:20px;
            border-radius:10px;
        }

        input{
            padding:10px;
            margin:5px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
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

        .btn{
            background:green;
            color:white;
            border:none;
            padding:12px;
            border-radius:5px;
            cursor:pointer;
            margin-top:20px;
        }
    </style>
</head>

<body>

<header>
    <h2>Effectuer une vente</h2>
</header>

<div class="container">

<form method="POST">

    <h3>Informations client</h3>

    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>

    <h3>Liste des articles</h3>

    <table>
        <tr>
            <th>Code</th>
            <th>Article</th>
            <th>Prix</th>
            <th>Quantité</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM article");

        while($a = $result->fetch_assoc()){
        ?>

        <tr>
            <td><?= $a['id_article'] ?></td>
            <td><?= $a['design'] ?></td>
            <td><?= $a['prix'] ?></td>
            <td>
                <input type="number"
                       name="qte[<?= $a['id_article'] ?>]"
                       value="0"
                       min="0">
            </td>
        </tr>

        <?php } ?>
    </table>

    <button class="btn" type="submit" name="valider">
        Valider la commande
    </button>

</form>

</div>

</body>
</html>