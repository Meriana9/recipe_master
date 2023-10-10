<?php

namespace App\Models\ChefsModel;



function findAll(\PDO $connexion): array /* j'ai pas besoin de faire un join  */
{
    $sql = "SELECT id AS userId,
                   name as username
            
            From users 
            
            ORDER BY username ASC;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id = 1)
{
    $sql = "SELECT us.id as userId, 
        us.name, us.biography, 
        ROUND(AVG(ra.value),1) AS rating, 
        us.picture
    FROM users us
    JOIN dishes di ON us.id = di.user_id  
    LEFT JOIN ratings ra ON di.id = ra.dish_id
    WHERE a.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}