<?php

namespace App\Controllers\BooksController;

use \App\Models\BooksModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/booksModel.php';
    $books = BooksModel\findAll($connexion);

    global $title, $content;
    $title = "Books";
    ob_start();
    include '../app/views/books/index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/booksModel.php';
    $book = BooksModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $book['title'];
    ob_start();
    include '../app/views/books/show.php';
    $content = ob_get_clean();
}
