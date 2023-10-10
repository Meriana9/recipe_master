<?php

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT DISTINCT  ing.name as ingredientname, dhi.ingredient_id as ingredientId
            from ingredients ing 
            join dishes_has_ingredients dhi on ing.id = dhi.ingredient_id
            join dishes di on di.id = dhi.dish_id;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByDishId(\PDO $connexion, int $id): array
{
    $sql = "SELECT *, ing.id as ingredientId
            FROM ingredients ing 
            JOIN dishes_has_ingredients dhi ON ing.id = dhi.ingredient_id
            WHERE dhi.dish_id = :id
            ORDER BY ing.name ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}