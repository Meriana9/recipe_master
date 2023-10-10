<?php

namespace App\Controllers\dishesController;

use \App\Models\DishesModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/dishesModel.php';
    $dishes = dishesModel\findAll($connexion);

    global $content;

    ob_start();
    include '../app/views/dishes/index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/dishesModel.php';
    $dish = dishesModel\findOneById($connexion, $id);



    global $title, $content;
    $title = $dish['name'];
    ob_start();
    include '../app/views/dishes/show.php';
    $content = ob_get_clean();
}


// API ACTIONS
function api_indexAction(\PDO $connexion)
{
    include_once '../app/models/dishesModel.php';
    $dishes = dishesModel\findAll($connexion);
    echo json_encode($dishes);
}