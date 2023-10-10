<?php
// ROUTER PRINCIPAL

// USERS: ROUTER DES USERS
// PATTERN: ?users=xxx
if (isset($_GET['users'])):
    include_once '../app/routers/users.php';

    // BOOKS: ROUTER DES DISHES
// PATTERN: ?dishes=xxx
elseif (isset($_GET['dishes'])):
    include_once '../app/routers/dishes.php';

    // BOOKS: ROUTER DES CHEFS
// PATTERN: ?chefs=xxx
elseif (isset($_GET['chefs'])):
    include_once '../app/routers/chefs.php';



// PATTERN: /
// CTRL: pagesController
// ACTION: home
// VIEW: pages/home.php
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;