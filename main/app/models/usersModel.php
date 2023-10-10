<?php

namespace App\Models\UsersModel;

function findOneByName(\PDO $connexion, array $data)
{
    $sql = "SELECT *
            FROM users
            WHERE name = :name;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->execute();

    return $rs->fetch(\PDO::FETCH_ASSOC);
}
