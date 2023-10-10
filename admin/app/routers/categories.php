<?php

use \App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'addForm':
        CategoriesController\addFormAction();
        break;

    case 'add':
        CategoriesController\addAction($connexion, [
            'name' => $_POST['name'],
            'description' => $_POST['description']
        ]);
        break;

    case 'delete':
        CategoriesController\deleteAction($connexion, $_GET['id']);
        break;

    case 'editForm':
        CategoriesController\editFormAction($connexion, $_GET['id']);
        break;
    /* UPDATE */
    case 'edit':
        CategoriesController\editAction($connexion, [
            'id' => $_GET['id'],
            'name' => $_POST['name'],
            'description' => $_POST['description']
        ]);
        break;

    default:
        CategoriesController\indexAction($connexion);
        break;
endswitch;