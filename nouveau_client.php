<?php
include 'config.php';
session_start();

if(isset($_POST['enregistrer'])){

    /* Génération automatique de l'ID client */

    $result = $conn->query("
        SELECT id_client
        FROM client
        ORDER BY id_client DESC
        LIMIT 1
    ");

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        $dernier = $row['id_client'];

        $numero = intval(substr($dernier,1));

        $numero++;

    }else{

        $numero = 1;
    }

    $id_client = "C".str_pad($numero,3,"0",STR_PAD_LEFT);

    /* Données client */

    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    $age = $_POST['age'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $mail = $_POST['mail'];

    /* Insertion */

    $sql = "
    INSERT INTO client
    (id_client,nom,prenom,age,adresse,ville,mail)
    VALUES
    (
    '$id_client',
    '$nom',
    '$prenom',
    '$age',
    '$adresse',
    '$ville',
    '$mail'
    )
    ";

    if(!$conn->query($sql)){
        die("Erreur : ".$conn->error);
    }

    header("Location: traitement_vente.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Nouveau Client</title>

<style>

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f4f6f8;
}

header{
    background:#1e3c72;
    color:white;
    text-align:center;
    padding:15px;
}

.formulaire{
    width:450px;
    margin:30px auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

.formulaire h3{
    text-align:center;
    color:#1e3c72;
}

input{
    width:100%;
    padding:12px;
    margin:8px 0;
    border:1px solid #ccc;
    border-radius:5px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:12px;
    background:green;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#0a8f0a;
}

.info{
    background:#eef3ff;
    padding:10px;
    border-radius:5px;
    margin-bottom:15px;
}

</style>

</head>
<body>

<header>
    <h2>Nouveau Client</h2>
</header>

<div class="formulaire">

    <div class="info">
        <strong>Nom :</strong> <?= $_SESSION['nom']; ?><br>
        <strong>Prénom :</strong> <?= $_SESSION['prenom']; ?>
    </div>

    <h3>Compléter les informations</h3>

    <form method="POST">

        <input
        type="number"
        name="age"
        placeholder="Âge"
        required>

        <input
        type="text"
        name="adresse"
        placeholder="Adresse"
        required>

        <input
        type="text"
        name="ville"
        placeholder="Ville"
        required>

        <input
        type="email"
        name="mail"
        placeholder="Adresse mail"
        required>

        <button type="submit" name="enregistrer">
            Enregistrer
        </button>

    </form>

</div>

</body>
</html>