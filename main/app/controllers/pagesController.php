<?php

namespace App\Controllers\PagesController;

function homeAction(\PDO $connexion)
{
    include_once '../app/models/dishesModel.php';
    $dishRandom = \App\Models\dishesModel\findOneRandom($connexion);

    include_once '../app/models/dishesModel.php';
    $dishes = \App\Models\dishesModel\findThreePopulars($connexion);



    global $content;
   
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}