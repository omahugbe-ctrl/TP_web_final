<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .container{
            background:white;
            padding:30px;
            width:320px;
            border-radius:15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            text-align:center;
            animation: fadeIn 0.6s ease-in-out;
        }

        h2{
            margin-bottom:20px;
            color:#1e3c72;
        }

        input{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:8px;
            outline:none;
            transition:0.3s;
        }

        input:focus{
            border-color:#2a5298;
            box-shadow:0 0 5px rgba(42,82,152,0.5);
        }

        button{
            width:100%;
            padding:12px;
            margin-top:10px;
            border:none;
            border-radius:8px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        .btn-login{
            background:#2a5298;
            color:white;
        }

        .btn-login:hover{
            background:#1e3c72;
        }

        .btn-register{
            background:#f1f1f1;
            color:#333;
        }

        .btn-register:hover{
            background:#ddd;
        }

        .msg{
            margin-top:10px;
            font-size:14px;
            color:red;
        }
        .btn-register-link{
            display:block;
            margin-top:10px;
            padding:12px;
            text-align:center;
            text-decoration:none;
            background:#f1f1f1;
            color:#333;
            border-radius:8px;
            font-weight:bold;
            transition:0.3s;
        }

        .btn-register-link:hover{
            background:#ddd;
        }
        @keyframes fadeIn{
            from{opacity:0; transform:translateY(-20px);}
            to{opacity:1; transform:translateY(0);}
        }
    </style>

</head>

<body>

<div class="container">

    <h2>Connexion</h2>

    <form method="POST">

        <input type="text" name="login" placeholder="Login" required>

        <input type="password" name="password" placeholder="Mot de passe" required>

        <button class="btn-login" type="submit" name="connecter">Se connecter</button>

    </form>

<!-- bouton inscription en dehors du form -->
<a href="register.php" class="btn-register-link">S'inscrire</a>

<?php
if (isset($_POST['connecter'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $req = $conn->query("SELECT * FROM users WHERE login='$login'");

    if ($req->num_rows > 0) {
        $user = $req->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            header("Location: home.php");
        } else {
            echo "<div class='msg'>Mot de passe incorrect</div>";
        }
    } else {
        echo "<div class='msg'>Utilisateur non trouvé</div>";
    }
}

if (isset($_POST['inscrire'])) {
    header("Location: register.php");
}
?>

</div>

</body>
</html>