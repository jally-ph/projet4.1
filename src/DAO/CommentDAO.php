<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        return $comment;
    }

    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
}