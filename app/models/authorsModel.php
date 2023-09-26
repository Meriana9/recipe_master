<?php

namespace App\Models\authorsModel;

function findAllPopulars(\PDO $connexion): array
{
    $sql = "SELECT  ROUND(AVG(note), 2) AS notation, 
                    au.*
            FROM books bk
            JOIN authors au ON bk.author_id = au.id
            LEFT JOIN users_notations un ON un.book_id = bk.id
            GROUP BY au.id
            ORDER BY notation DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion): array
{
    $sql = "SELECT  ROUND(AVG(note), 2) AS notation, 
                    au.*
            FROM books bk
            JOIN authors au ON bk.author_id = au.id
            LEFT JOIN users_notations un ON un.book_id = bk.id
            GROUP BY au.id
            ORDER BY au.created_at DESC
            LIMIT 6;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
