<?php

switch ($_GET['dishes']):
    //DETAIL D'UN DISH
    //PATTERN: /index.php?dishes=show&id=x
    //CTRL: dishesController
    //ACTION: show
    case 'show':
        include_once '../app/controllers/dishesController.php';
        \App\Controllers\DishesController\showAction($connexion, $_GET['id']);
        break;

    case 'dishes':
        include_once '../app/controllers/dishesController.php';
        \App\Controllers\DishesController\indexAction($connexion);
        break;


    default:
        include_once '../app/controllers/dishesController.php';
        \App\Controllers\DishesController\indexAction($connexion);
        break;
endswitch;