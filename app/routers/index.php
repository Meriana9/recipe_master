<?php
// ROUTER PRINCIPAL

// BOOKS.INDEX: Liste des books
// PATTERN: ?books=index
// CTRL: booksController
// ACTION: index
if (isset($_GET['books'])):
    include_once '../app/routers/books.php';

    // AUTHORS.INDEX: Liste des authors
// PATTERN: ?authors=index
// CTRL: authorsController
// ACTION: index
elseif (isset($_GET['authors']) && $_GET['authors'] === 'index'):
    include_once '../app/controllers/authorsController.php';
    \App\Controllers\AuthorsController\indexAction($connexion);

    /* 
    Route détail d'un author
    PATTERN: authors/{id}/{lastname}-{firstname}
    TARGET: ?authors=show&id=x
    CTRL: authorsController
    ACTION: showAction
    VIEW: authors/show */

    // Route détail d'un author
// PATTERN: authors/{id}/{lastname}-{firstname}
// Exemple d'URL: authors/1/doe-john
elseif (preg_match('/^authors\/(\d+)\/([a-zA-Z]+)-([a-zA-Z]+)/', $_SERVER['REQUEST_URI'], $matches)):
    $id = $matches[1];
    $lastname = $matches[2];
    $firstname = $matches[3];

    include_once '../app/controllers/authorsController.php';
    \App\Controllers\AuthorsController\showAction($connexion, $id);

    // PATTERN: /
// CTRL: pagesController
// ACTION: home
// VIEW: pages/home.php
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;