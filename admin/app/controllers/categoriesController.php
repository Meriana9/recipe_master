<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;

include_once '../app/models/categoriesModel.php';


function indexAction(\PDO $connexion)
{
    // Je mets le findAll() dans $categories
    $categories = CategoriesModel\findAll($connexion);

    // Je charge la vue categories.index dans $content
    global $title, $content;
    $title = "Liste des catégories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}

function addFormAction()
{
    // Je charge la vue categories.add dans $content
    global $title, $content;
    $title = "Ajouter une catégorie";
    ob_start();
    include '../app/views/categories/addForm.php';
    $content = ob_get_clean();
}

function addAction(\PDO $connexion, array $data )
{
    include_once '../app/models/categoriesModel.php';
    $id = CategoriesModel\insert($connexion, $data);
    header('location: ' . ADMIN_ROOT . 'categories');
}

function deleteAction(\PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModel.php';
    $resultat = CategoriesModel\delete($connexion, $id);

    //rediriger vers la liste des categories
    header('location: ' . ADMIN_ROOT . 'categories');
}
function editFormAction(\PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModel.php';
    $categorie = CategoriesModel\findOneById($connexion, $id);

    global $title, $content;
    $title = "Modification d'un catégorie";
    ob_start();
    include '../app/views/categories/editForm.php';
    $content = ob_get_clean();
}

function editAction(\PDO $connexion, array $data)
{
    include_once '../app/models/categoriesModel.php';
    $return = CategoriesModel\update($connexion, $data);
    header('location: ' . ADMIN_ROOT . 'categories');
}