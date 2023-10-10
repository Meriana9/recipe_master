<?php

use \App\Controllers\DishesController;

include_once '../app/controllers/dishesController.php';

switch ($_GET['dishes']):
    /* on a besoin de DB ici */
    case 'addForm':
        DishesController\addFormAction($connexion);
        break;

    case 'addInsert':
        DishesController\addInsertAction($connexion);
        break;

    case 'delete':
        DishesController\deleteAction($connexion, $_GET['id']);
        break;

    case 'editForm':
        DishesController\editFormAction($connexion, $_GET['id']);
        break;
    /* UPDATE */
    case 'editUpdate':
        DishesController\editUpdateAction($connexion, $_GET['id']);
        break;

    default:
        DishesController\indexAction($connexion);
        break;
endswitch;