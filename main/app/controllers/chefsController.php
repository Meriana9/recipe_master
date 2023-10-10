<?php

namespace App\Controllers\ChefsController;

use \App\Models\ChefsModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/chefsModel.php';
    $chefs = ChefsModel\findAll($connexion);

    global $title, $content;
    $title = "Chefs";
    ob_start();
    include '../app/views/chefs/index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/chefsModel.php';
    $chef = ChefsModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $chef['username'];
    ob_start();
    include '../app/views/chefs/show.php';
    $content = ob_get_clean();
}