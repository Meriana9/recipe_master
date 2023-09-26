<?php

namespace App\Controllers\AuthorsController;

use \App\Models\AuthorsModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/authorsModel.php';
    $authors = AuthorsModel\findAll($connexion);

    global $title, $content;
    $title = "Authors";
    ob_start();
    include '../app/views/authors/index.php';
    $content = ob_get_clean();
}


// Action pour afficher les détails d'un auteur
function showAction(\PDO $connexion, $authorId)
{
    // Inclure le modèle des auteurs
    include_once '../app/models/authorsModel.php';

    // Appeler la fonction pour récupérer les détails de l'auteur spécifié par $authorId
    $author = AuthorsModel\find($connexion, $authorId);

    // Vérifier si l'auteur existe
    if (!$author) {
        // Gérer le cas où l'auteur n'est pas trouvé (vous pouvez rediriger vers une page d'erreur, par exemple)
        // Par exemple, vous pouvez rediriger vers une page 404 avec header("HTTP/1.0 404 Not Found");
        // Assurez-vous d'inclure la vue d'erreur appropriée dans ce cas.
        return;
    }

    // Définir les variables pour le titre et le contenu de la page
    global $title, $content;
    $title = "Author Details - " . $author['firstname'] . ' ' . $author['lastname'];

    // Utiliser la temporisation de sortie pour inclure la vue des détails de l'auteur
    ob_start();
    include '../app/views/authors/show.php';
    $content = ob_get_clean();
}