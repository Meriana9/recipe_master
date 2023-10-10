<?php

if (isset($_GET['dishes'])):
    switch ($_GET['dishes']):
        default:
            include_once '../app/controllers/dishesController.php';
            \App\Controllers\DishesController\api_indexAction($connexion);
            break;
    endswitch;
else:
endif;