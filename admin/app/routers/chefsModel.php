<?php

namespace App\Models\ChefsModel;


function findAll(\PDO $connexion): array
{
    $sql = "SELECT name as username, id as userId
            From users
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}