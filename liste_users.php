<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Utilisateurs</title>

    <style>
        body{
            font-family: Arial;
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
            padding:10px 15px;
            border:none;
            border-radius:6px;
            font-weight:bold;
            cursor:pointer;
        }

        .quit{
            background:red;
            color:white;
            text-decoration:none;
            padding:10px 15px;
            border-radius:6px;
        }

        h2{
            text-align:center;
            margin-top:20px;
            color:#1e3c72;
        }

        table{
            width:90%;
            margin:20px auto;
            border-collapse:collapse;
            background:white;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        th,td{
            padding:12px;
            border:1px solid #ddd;
            text-align:center;
        }

        th{
            background:#2a5298;
            color:white;
        }

        tr:hover{
            background:#f1f1f1;
        }
    </style>

</head>

<body>

<header>
    <a class="quit" href="home.php">Quitter</a>
    <h3>LISTE DES UTILISATEURS</h3>
    <div></div>
</header>

<h2>UTILISATEURS ENREGISTRÉS</h2>

<table>

<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Contact</th>
    <th>Login</th>
</tr>

<?php
$sql = $conn->query("SELECT * FROM users");

while($row = $sql->fetch_assoc()){
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nom']}</td>
        <td>{$row['prenom']}</td>
        <td>{$row['contact']}</td>
        <td>{$row['login']}</td>
    </tr>";
}
?>

</table>

</body>
</html>