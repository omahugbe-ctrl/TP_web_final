<?php
$conn = new mysqli("localhost", "root", "", "essaie_bdd");

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>