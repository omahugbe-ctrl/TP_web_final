<?php
include 'config.php';
session_start();

if(
    !isset($_SESSION['nom']) ||
    !isset($_SESSION['prenom']) ||
    !isset($_SESSION['qte'])
){
    die("Aucune vente en cours.");
}

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$qte = $_SESSION['qte'];

/* Recherche du client */
$client = $conn->query("
    SELECT *
    FROM client
    WHERE nom='$nom'
    AND prenom='$prenom'
");

if($client->num_rows == 0){
    die("Client introuvable.");
}

$c = $client->fetch_assoc();
$id_client = $c['id_client'];

/* Génération du numéro de facture */
$id_comm = "FAC-".date("YmdHis").rand(100,999);

$date = date("Y-m-d");

$total = 0;

/* Calcul du montant total */
foreach($qte as $id_article => $quantite){

    if($quantite > 0){

        $article = $conn->query("
            SELECT *
            FROM article
            WHERE id_article='$id_article'
        ");

        if($article->num_rows > 0){

            $a = $article->fetch_assoc();

            $total += $a['prix'] * $quantite;
        }
    }
}

/* Création de la commande */
$sql = "
INSERT INTO commande
(id_comm,date_comm,id_client,montant)
VALUES
('$id_comm','$date','$id_client','$total')
";

if(!$conn->query($sql)){
    die("Erreur commande : ".$conn->error);
}

/* Détail des articles achetés */
foreach($qte as $id_article => $quantite){

    if($quantite > 0){

        $sql = "
        INSERT INTO contenir
        (id_comm,id_article,qte_comm)
        VALUES
        ('$id_comm','$id_article','$quantite')
        ";

        if(!$conn->query($sql)){
            die("Erreur détail commande : ".$conn->error);
        }
    }
}

/* Nettoyage session */
unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset($_SESSION['qte']);

header("Location: liste_vente.php");
exit();
?>