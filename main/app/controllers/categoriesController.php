<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;


function indexAction(\PDO $connexion)
{
    include_once '../app/models/categoriesModel.php';
    $categories = CategoriesModel\findAll($connexion);

    
    $title = "categories";
    
    $content =  include '../app/views/categories/_index.php';
  
}
/* function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModel.php';
    $chef = CategoriesModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $chef['firstname'] . " " . $chef['lastname'];
    ob_start();
    include '../app/views/categories/show.php';
    $content = ob_get_clean();
} */