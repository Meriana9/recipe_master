<?php

namespace App\Controllers\DishesController;

use \App\Models\DishesModel as Dish;

include_once '../app/models/dishesModel.php';


function indexAction(\PDO $connexion)
{
    // Je mets le findAll() dans $dishees
    $dishes = Dish\findAll($connexion);

    // Je charge la vue dishees.index dans $content
    global $title, $content;
    $title = "Liste des dishes";
    ob_start();
    include '../app/views/dishes/index.php';
    $content = ob_get_clean();
}
function addFormAction(\PDO $connexion)
{
    // chercher chefs
    include_once '../app/models/chefsModel.php';
    $users = \App\Models\ChefsModel\findAll($connexion);
    // chercher les cat
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);

    // chercher les ingre
    include_once '../app/models/ingredientsModel.php';
    $ingredients = \App\Models\IngredientsModel\findAll($connexion);

    // Je charge la vue dishees.index dans $content
    global $title, $content;
    $title = "Ajout des dishes";
    ob_start();
    include '../app/views/dishes/addForm.php';
    $content = ob_get_clean();
}
function addInsertAction(\PDO $connexion)
{
    //je demande au modèle d'ajouter le dish
    include_once '../app/models/dishesModel.php';
    $id = Dish\insertOne($connexion, $_POST);

    // je demande au modèle d'ajouter les ingredients correspondants
    foreach ($_POST['ingredients'] as $ingredientId) {

        $return = Dish\insertIngredientById($connexion, [' id' => $id, 'ingredientId' => $ingredientId]);
    }



    //je redirige vers la liste des dishes
    header('location: ' . ADMIN_ROOT . 'dishes');
}


function deleteAction(\PDO $connexion, int $id)
{

    //demande modèle de supprimer les liaison N-M correspondantes
    include_once '../app/models/dishesModel.php';
    $return1 = Dish\deleteDishHasCatByDishId($connexion, $id);

    //je demande au modèle de supprimer le dish
    $return2 = Dish\deleteOneById($connexion, $id);


    //rediriger vers la liste des categories
    header('location: ' . ADMIN_ROOT . 'dishes');
}

function editFormAction(\PDO $connexion, int $id)
{
    // demande au modèle le dish à afficher dans le form
    include_once '../app/models/dishesModel.php';
    $dish = Dish\findOneById($connexion, $id);

    // chercher les cat
    include_once '../app/models/dishesModel.php';
    $dishIngredients = Dish\findIngByDishId($connexion, $id);

    // chercher chefs
    include_once '../app/models/chefsModel.php';
    $users = \App\Models\ChefsModel\findAll($connexion);
    // chercher les cat
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion);

    // chercher les ingre
    include_once '../app/models/ingredientsModel.php';
    $ingredients = \App\Models\IngredientsModel\findAll($connexion);


    // Je charge la vue editForm dans $content
    global $title, $content;
    $title = "Edition des dishes";
    ob_start();
    include '../app/views/dishes/editForm.php';
    $content = ob_get_clean();
}

function editUpdateAction(\PDO $connexion, int $id)
{

    // je demande au modèle de supprimer toutes les ingredients correspondents
    include_once '../app/models/dishesModel.php';
    $return1 = Dish\deleteDishHasCatByDishId($connexion, $id);

    //je demande au modèle de modifier le dish
    $return2 = Dish\updateOneById($connexion, $id, $_POST);
    //je demadne au modèle d'ajouter les ingredients correspondents 
    foreach ($_POST['ingredients'] as $ingredientId) {
        $return = Dish\insertIngredientById($connexion, [
            'dish_id' => $id,
            'ingredient_id' => $ingredientId
        ]);

    }

    //rediriger vers la liste des categories
    header('location: ' . ADMIN_ROOT . 'dishes');

}