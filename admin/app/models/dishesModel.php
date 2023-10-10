<?php

namespace App\Models\DishesModel;


function findAll(\PDO $connexion): array
{
    $sql = "SELECT  
            di.*, di.id,
            us.name AS username
            FROM dishes di
            JOIN users us ON us.id = di.user_id
            
            ORDER BY di.id DESC
            LIMIT 9;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT di.*, us.name as username, us.id as userId
            from dishes di
            join users us on us.id = di.user_id
            WHERE di.id =:id;
            ";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    /* $rs->debugDumpParams(); */
    return $rs->fetch(\PDO::FETCH_ASSOC);
}



function findAllByChefId(\PDO $connexion, int $id): array
{
    $sql = "SELECT *
            FROM dishes  
            WHERE user_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function deleteDishHasCatByDishId(\PDO $connexion, int $id): bool
{

    $sql = "DELETE 
    FROM dishes_has_ingredients 
    WHERE dish_id = :dish;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':dish', $id, \PDO::PARAM_INT);
    return intval($rs->execute());

}
function deleteOneById(\PDO $connexion, int $id): bool
{

    $sql = "DELETE 
    FROM dishes
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return intval($rs->execute());

}

function insertOne(\PDO $connexion, array $data): int
{

    $sql = " INSERT INTO dishes
            SET name = :name,
            description=:description,
            prep_time = :time,
            portions = :portion,
            user_id = :username,
            type_id = :catname,
            created_at = now();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':time', $data['time'], \PDO::PARAM_STR);
    $rs->bindValue(':portion', $data['portion'], \PDO::PARAM_INT);
    $rs->bindValue(':username', $data['username'], \PDO::PARAM_INT);
    $rs->bindValue(':catname', $data['catname'], \PDO::PARAM_INT);
    $rs->execute();
    return $connexion->lastInsertId();


}

function insertIngredientById(\PDO $connexion, array $data)
{

    $sql = "INSERT INTO dishes_has_ingredients
    SET dish_id = :id,
        ingredient_id =:ingredentId;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':dish_id', $data['id'], \PDO::PARAM_INT);
    $rs->bindValue(':ingredient_id', $data['ingredientId'], \PDO::PARAM_INT);

    return $rs->execute();
}

function findIngByDishId(\PDO $connexion, int $id): array
{
    $sql = "SELECT ingredient_id
    FROM dishes_has_ingredients
    WHERE dish_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_COLUMN);
}

function updateOneById(\PDO $connexion, int $id, array $data)
{

    $sql = "UPDATE dishes
    SET  name = :name,
            description=:description,
            prep_time = :time,
            portions = :portion,
            user_id = :username,
            type_id = :catname
            WHERE id = :id ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':time', $data['time'], \PDO::PARAM_STR);
    $rs->bindValue(':portion', $data['portion'], \PDO::PARAM_INT);
    $rs->bindValue(':username', $data['username'], \PDO::PARAM_INT);
    $rs->bindValue(':catname', $data['catname'], \PDO::PARAM_INT);

    return $rs->execute();
}