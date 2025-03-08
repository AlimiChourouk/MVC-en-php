<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=2">
    <title>Restaurants</title>
</head>
<body>
    <header>
        <a href="panier.php">
            <img class="imgPanier" src="../img/panierr.png" alt="panier">
        </a>
    </header>

    <section id="section1">
        <img src="../img/burger.png" alt="image de burger">
    </section>

    <div>
        <?= $restaurants ?>
    </div>
</body>
</html>