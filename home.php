<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #141e30, #243b55);
            color:white;
        }

        /* HEADER */
        header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:15px 30px;
            background: rgba(0,0,0,0.4);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        header h2{
            text-align:center;
            flex:1;
            font-size:20px;
        }

        header img{
            border-radius:10px;
        }

        /* TEXTE */
        .intro{
            text-align:center;
            margin:30px auto;
            width:70%;
            font-size:18px;
            line-height:1.6;
        }

        /* MENU GRID */
        .menu{
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap:20px;
            width:80%;
            margin:40px auto;
        }

        .card{
            background:white;
            color:#333;
            padding:20px;
            border-radius:12px;
            text-align:center;
            text-decoration:none;
            font-weight:bold;
            transition:0.3s;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        .card:hover{
            transform: translateY(-8px);
            background:#2a5298;
            color:white;
        }

        h3{
            text-align:center;
            margin-top:30px;
        }
    </style>

</head>

<body>

<header>
    <img src="images/logo_uac.caf5b669.png" alt="Logo UAC" width="100"> 
    <h2>Gestion de vente</h2>
    <img src="images/ENEAM-logo-300x243.png" alt="Logo ENEAM" width="100">
</header>

<div class="intro">
    Bienvenue sur votre plateforme de gestion des clients, articles et ventes.
    Ce système permet une gestion simple, rapide et efficace des opérations commerciales.
</div>

<h3>MENU PRINCIPAL</h3>

<div class="menu">

    <a class="card" href="liste_users.php">👤 Liste des utilisateurs</a>

    <a class="card" href="liste_client.php">👥 Liste des clients</a>

    <a class="card" href="liste_article.php">📦 Liste des articles</a>

    <a class="card" href="effectuer_vente.php">🛒 Effectuer une vente</a>

    <a class="card" href="liste_vente.php">📊 Liste des ventes</a>

</div>

</body>
</html>