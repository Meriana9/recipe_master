<?php

namespace App\Models\dishesModel;

function findThreePopulars(\PDO $connexion): array
{
    $sql = "SELECT  ROUND(avg(ra.value), 1) AS rating, 
                di.*, 
                us.id AS userID,
                us.name as username,
                ty.id as typeOfDishe,
                ty.name, count(co.id) as comments
            FROM dishes di
            JOIN types_of_dishes ty ON ty.id = di.type_id
            JOIN users us ON di.user_id = us.id
            join comments co on co.id = di.user_id
            LEFT JOIN ratings ra ON ra.dish_id = di.id
            GROUP BY di.id
            ORDER BY rating DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function findAll(\PDO $connexion): array
{
    $sql = "SELECT  MAX(ra.value) AS rating, 
                di.*, 
                us.id AS userID,
                us.name AS username, 
                COUNT(co.id) AS comments
            FROM dishes di
            JOIN users us ON di.id = us.id
            JOIN comments co ON co.id = di.user_id
            JOIN ratings ra ON ra.dish_id = di.id 
            GROUP BY username, userID
            ORDER BY di.created_at DESC
            LIMIT 9;

";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT
                ROUND(ra.value, 1) AS rating,
                count(co.id) as comments,
                di.name as name, di.id as id,
                us.name as username,
                di.description as description,
                co.content as content,
                di.prep_time as time, di.picture as picture, us.picture as pic
            FROM comments co
            JOIN dishes di ON di.id = co.dish_id
            JOIN ratings ra ON ra.dish_id = di.id
            JOIN users us ON us.id = ra.user_id
            WHERE di.id = :id
            GROUP BY di.name, username, content, rating, description, time, picture, pic;
    ";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

/* function findAllBySearch(\PDO $connexion, string $search)
{
    $sql = "SELECT  DISTINCT dishes.id as idDishe,
    dishes.title as titleDishe,
    dishes.description as descriptionDishe
            FROM dishes di
            JOIN categories ct ON bk.category_id = ct.id
            JOIN authors au ON bk.author_id = au.id
            LEFT JOIN users_nota
            tions un ON un.book_id = bk.id
            WHERE bk.id = :id;
            ";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $search, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
} */

function findOneRandom(\PDO $connexion): array
{
    $sql = "SELECT 
        ROUND(AVG(ra.value), 1) AS rating,
        count(co.id) AS comments,
        di.name, di.id as dishId,
        us.name AS username, di.description as description, di.picture as pic
    FROM comments co 
    JOIN dishes di ON di.id = co.dish_id
    JOIN dishes_has_ingredients dhi ON dhi.dish_id = di.id
    JOIN ingredients ing ON ing.id = dhi.ingredient_id
    JOIN ratings ra ON ra.dish_id = di.id
    JOIN users us ON di.user_id = us.id
    GROUP BY  di.id
    ORDER BY RAND()
    LIMIT 1;";

    $rs = $connexion->query($sql);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findDishesByChefId(\PDO $connexion, int $id): array
{
    $sql = "SELECT *
            FROM dishes  
            WHERE user_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    $result = $rs->fetchAll(\PDO::FETCH_ASSOC);
    var_dump($result);
    return $result;
}
/* SELECT ROUND(AVG(ra.value), 1) AS rating, 
di.id as dishId
            FROM dishes di
            join ratings ra on ra.dish_id = di.id 
            WHERE di.user_id = 4
            group by di.id */