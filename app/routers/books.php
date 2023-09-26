<?php

switch ($_GET['books']):
    case 'index':
        include_once '../app/controllers/booksController.php';
        \App\Controllers\BooksController\indexAction($connexion);
        break;

    case 'show':
        include_once '../app/controllers/booksController.php';
        \App\Controllers\BooksController\showAction($connexion, $_GET['id']);
        break;
endswitch;
