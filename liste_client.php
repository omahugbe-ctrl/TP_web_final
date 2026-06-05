<?php include 'config.php'; ?>

<?php
// AJOUT CLIENT
if (isset($_POST['save'])) {

    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $mail = $_POST['mail'];

    $result = $conn->query("SELECT COUNT(*) AS total FROM client");
$data = $result->fetch_assoc();

$numero = $data['total'] + 1;

$id = "C" . str_pad($numero, 3, "0", STR_PAD_LEFT);

$conn->query("INSERT INTO client VALUES('$id','$nom','$prenom','$age','$adresse','$ville','$mail')");

    header("Location: liste_client.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>

    <style>
        body{
            font-family:Arial;
            margin:0;
            background:#f4f6f8;
        }

        header{
            background:#2a5298;
            color:white;
            padding:15px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .btn{
            padding:10px 15px;
            border:none;
            border-radius:6px;
            cursor:pointer;
            font-weight:bold;
        }

        .quit{
            background:red;
            color:white;
            text-decoration:none;
            padding:10px 15px;
            border-radius:6px;
        }

        .add{
            background:green;
            color:white;
        }

        table{
            width:90%;
            margin:20px auto;
            border-collapse:collapse;
        }

        th,td{
            padding:10px;
            border:1px solid #ccc;
            text-align:center;
        }

        .form{
            width:300px;
            margin:20px auto;
            background:white;
            padding:15px;
            border-radius:10px;
            display:none;
        }

        input{
            width:100%;
            padding:8px;
            margin:5px 0;
        }

        .show{
            display:block;
        }
    </style>
</head>

<body>

<header>
    <a class="quit" href="home.php">Quitter</a>

    <h3>LISTE DES CLIENTS</h3>

    <button class="btn add" onclick="document.getElementById('form').classList.toggle('show')">
        Ajouter
    </button>
</header>

<!-- FORMULAIRE AJOUT -->
<div class="form" id="form">

    <form method="POST">

        
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="number" name="age" placeholder="Age">
        <input type="text" name="adresse" placeholder="Adresse">
        <input type="text" name="ville" placeholder="Ville">
        <input type="email" name="mail" placeholder="Mail">

        <button class="btn add" type="submit" name="save">Enregistrer</button>

    </form>

</div>

<!-- LISTE CLIENTS -->
<table>

<tr>
    <th>ID</th><th>Nom</th><th>Prénom</th><th>Age</th><th>Adresse</th><th>Ville</th><th>Mail</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM client");

while($row = $res->fetch_assoc()){
    echo "<tr>
        <td>{$row['id_client']}</td>
        <td>{$row['nom']}</td>
        <td>{$row['prenom']}</td>
        <td>{$row['age']}</td>
        <td>{$row['adresse']}</td>
        <td>{$row['ville']}</td>
        <td>{$row['mail']}</td>
    </tr>";
}
?>

</table>

</body>
</html>