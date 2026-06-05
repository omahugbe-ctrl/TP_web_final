<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>

<title>Liste des ventes</title>

<style>

body{
    font-family:Arial, sans-serif;
    background:#f4f6f8;
    margin:0;
}

header{
    background:#1e3c72;
    color:white;
    padding:15px;
    text-align:center;
}

.container{
    width:95%;
    margin:20px auto;
}

.quit{
    background:red;
    color:white;
    padding:10px 15px;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}

table{
    width:100%;
    margin-top:20px;
    border-collapse:collapse;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

th{
    background:#2a5298;
    color:white;
    padding:12px;
}

td{
    padding:10px;
}

th,td{
    border:1px solid #ccc;
    text-align:center;
}

tr:hover{
    background:#f5f5f5;
}

.articles{
    text-align:left;
    line-height:1.8;
}

.montant{
    font-weight:bold;
    color:green;
}

</style>

</head>

<body>

<header>
    <h2>Liste des Factures</h2>
</header>

<div class="container">

    <a href="home.php" class="quit">
        Quitter
    </a>

    <table>

        <tr>
            <th>N° Facture</th>
            <th>Date</th>
            <th>Client</th>
            <th>Articles achetés</th>
            <th>Montant Total</th>
        </tr>

        <?php

        $sql = $conn->query("SELECT
            commande.*,
            client.nom,
            client.prenom
        FROM commande
        INNER JOIN client
        ON commande.id_client = client.id_client
        ORDER BY commande.date_comm DESC
        ");

        while($row = $sql->fetch_assoc()){

            $id_comm = $row['id_comm'];

            $articles = "";

            $detail = $conn->query("SELECT
                article.design,
                article.prix,
                contenir.qte_comm
            FROM contenir
            INNER JOIN article
            ON contenir.id_article = article.id_article
            WHERE contenir.id_comm = '$id_comm'
            ");

            while($a = $detail->fetch_assoc()){

                $articles .=
                "• ".$a['design'].
                " (".$a['qte_comm'].
                " × ".$a['prix'].
                " FCFA)<br>";
            }

            echo "

            <tr>

                <td>".$row['id_comm']."</td>

                <td>".$row['date_comm']."</td>

                <td>"
                .$row['nom']." "
                .$row['prenom'].
                "</td>

                <td class='articles'>
                ".$articles."
                </td>

                <td class='montant'>
                ".$row['montant']." FCFA
                </td>

            </tr>

            ";
        }

        ?>

    </table>

</div>

</body>
</html>