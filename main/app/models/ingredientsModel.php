<?php

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM ingredients
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByDishId(\PDO $connexion, int $id): array
{
    $sql = "SELECT concat(dih.quantity , ' ' , ing.unit , ' ', ing.name) as ingredient, di.name
            FROM ingredients ing
            join dishes_has_ingredients dih on dih.ingredient_id = ing.id
            JOIN dishes di ON dih.dish_id = di.id
            WHERE di.id = :id
            ORDER BY di.name ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}