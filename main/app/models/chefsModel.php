<?php

namespace App\Models\chefsModel;



function findAll(\PDO $connexion): array
{
    $sql = "SELECT distinct ROUND(avg(ra.value), 1) AS rating, 
                di.*, 
                us.id AS userID,
                us.name as username,
                us.biography as bio,
                us.picture as pic
            FROM dishes di
            JOIN users us ON di.user_id = us.id
             JOIN ratings ra ON ra.dish_id = di.id
            GROUP BY di.id
            ORDER BY us.created_at DESC
            LIMIT 9;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id )
{
    $sql = "SELECT us.name as username,
            us.picture as pic, us.biography 
            as bio, us.id as userId
    FROM users us
    JOIN dishes di ON us.id = di.user_id  
    WHERE us.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}