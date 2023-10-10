<?php 
 switch ($_GET['$categories']):
    case 'show':
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\CategoriesController\showAction($connexion, $_GET['id']);
    break;

default:
    include_once '../app/controllers/categoriesController.php';
    \App\Controllers\categoriesController\indexAction($connexion);
    break;

endswitch;