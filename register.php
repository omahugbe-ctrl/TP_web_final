<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css">
    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        }

        .container{
            background:white;
            padding:30px;
            width:350px;
            border-radius:15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            text-align:center;
            animation: fadeIn 0.6s ease-in-out;
        }

        h2{
            color:#203a43;
            margin-bottom:20px;
        }

        input{
            width:100%;
            padding:12px;
            margin:8px 0;
            border:1px solid #ccc;
            border-radius:8px;
            outline:none;
            transition:0.3s;
        }

        input:focus{
            border-color:#2c5364;
            box-shadow:0 0 5px rgba(44,83,100,0.5);
        }

        button{
            width:100%;
            padding:12px;
            margin-top:10px;
            border:none;
            border-radius:8px;
            background:#2c5364;
            color:white;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#0f2027;
        }

        .msg{
            margin-top:10px;
            font-size:14px;
            color:red;
        }
        /* RESPONSIVE */
    @media (max-width: 500px){
        form{
            width: 90%;
        }
    }

        @keyframes fadeIn{
            from{opacity:0; transform:translateY(-20px);}
            to{opacity:1; transform:translateY(0);}
        }
    </style>

</head>

<body>

<div class="container">

    <h2>Créer un compte</h2>

    <form method="POST">

        <input type="text" name="nom" placeholder="Nom" required>

        <input type="text" name="prenom" placeholder="Prénom" required>

        Contact: <input id="phone" type="tel" name="contact" required>

        <input type="text" name="login" placeholder="Login" required>

        <input type="password" name="password" placeholder="Mot de passe" required>

        <button type="submit" name="save">Enregistrer</button>

    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

    <script>
    const input = document.querySelector("#phone");

    window.intlTelInput(input, {
        initialCountry: "bj",   // Bénin par défaut
        separateDialCode: true, // affiche +229 séparé
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });
    </script>

<?php
if (isset($_POST['save'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $contact = $_POST['contact'];
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nom, prenom, contact, login, password)
            VALUES ('$nom', '$prenom', '$contact', '$login', '$password')";

    if ($conn->query($sql)) {
        header("Location: home.php");
    } else {
        echo "<div class='msg'>Erreur : " . $conn->error . "</div>";
    }
}
?>

</div>

</body>
</html>