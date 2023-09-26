<?php

namespace App\Controllers\PagesController;

function homeAction(\PDO $connexion)
{
    include_once '../app/models/booksModel.php';
    $books = \App\Models\booksModel\findAllPopulars($connexion);

    include_once '../app/models/authorsModel.php';
    $authors = \App\Models\authorsModel\findAllPopulars($connexion);

    global $title, $content;
    $title = "Popular Books - Popular Authors";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
