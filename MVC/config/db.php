
<?php
$host = 'localhost';
$dbname = 'farhaevents'; // ← remplace par le vrai nom de ta base
$username = 'root';
$password = 'root'; // ← OUI ! MAMP exige ce mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie !";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

?>
