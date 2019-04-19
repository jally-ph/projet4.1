<?php


namespace App\src\DAO;


class DeleteArticle
{

    public function deleteThis()
    {
        $sql = 'DELETE id, title, content, author, createdAt FROM archive WHERE id=?';
        $sql->closeCursor();
        return 'Cet article a bien été supprimé';
    }
}