<?php
require_once(__DIR__ .'/../models/PlatModel.php');

        function afficherPlats() {
            $plats = getAllPlats();
            $platsParCuisine = [];
            foreach ($plats as $plat) {
                $platsParCuisine[$plat['TypeCuisine']][] = $plat;
            }
            require (__DIR__ .'/../views/restaurantsView.php');
           
        }
       
       
       
    ?>