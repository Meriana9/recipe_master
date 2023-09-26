<?php

namespace App\Models\UsersModel;

function findOneByPseudoPassword(\PDO $connexion, array $data)
{
    $sql = "SELECT *
            FROM users
            WHERE pseudo = :pseudo
            AND password = :password;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':pseudo', $data['pseudo'], \PDO::PARAM_STR);
    $rs->bindValue(':password', $data['password'], \PDO::PARAM_STR);
    $rs->execute();

    return $rs->fetch(\PDO::FETCH_ASSOC);
}