<?php
require_once '../models/PlatModel.php';

class RestaurantController {
    private $model;

    public function __construct() {
        $this->model = new PlatModel();
    }

    public function displayRestaurants() {
        // Vérifie si le client est connecté
        if (!isset($_SESSION["client"])) {
            // Pour l'instant, on ne redirige pas, mais vous pourriez ajouter une redirection
            // header("Location: login.php");
            // exit;
            $restaurants = "<p>Veuillez vous connecter pour voir les plats.</p>";
            require '../views/restaurantsView.php';
            return;
        }

        // Récupère tous les plats
        $plats = $this->model->getAllPlats();

        // Organise les plats par type de cuisine
        $platsParCuisine = [];
        foreach ($plats as $plat) {
            $platsParCuisine[$plat['TypeCuisine']][] = $plat;
        }

        // Construit le HTML dans le Contrôleur (mais idéalement, ça ira dans la Vue)
        $restaurants = "<div class='cuisine-container'>";
        foreach ($platsParCuisine as $cuisine => $plats) {
            $restaurants .= "<div class='cuisine'>";
            $restaurants .= "<h2>" . htmlspecialchars($cuisine) . "</h2>";
            $restaurants .= "<div class='plats-container'>";
            foreach ($plats as $plat) {
                $restaurants .= "<div id='{$plat['idPlat']}' class='plat'>";
                $restaurants .= "<img src=\"" . htmlspecialchars($plat['image']) . "\" alt=\"" . htmlspecialchars($plat['nomPlat']) . "\">";
                $restaurants .= "<p><strong>Nom :</strong> " . htmlspecialchars($plat['nomPlat']) . "</p>";
                $restaurants .= "<p><strong>Catégorie :</strong> " . htmlspecialchars($plat['categoriePlat']) . "</p>";
                $restaurants .= "<p><strong>Prix :</strong> " . htmlspecialchars($plat['prix']) . " $</p>";
                $restaurants .= "<form action='ajouter_panier.php' method='POST'>";
                $restaurants .= "<button type='submit' name='ajouter' value='{$plat['idPlat']}'>Ajouter</button>";
                $restaurants .= "</form>";
                $restaurants .= "</div>";
            }
            $restaurants .= "</div>";
            $restaurants .= "</div>";
        }
        $restaurants .= "</div>";

        // Charge la Vue avec les données
        require '../views/restaurantsView.php';
    }
}