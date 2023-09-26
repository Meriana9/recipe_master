<?php

namespace App\Models\tagsModel;

function findAllByBookId(\PDO $connexion, int $id): array
{
    $sql = "SELECT * 
            FROM tags t
            JOIN books_has_tags bht ON bht.tag_id = t.id
            WHERE bht.book_id = :id
            ORDER BY t.name ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
