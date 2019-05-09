<?php

namespace App\src\DAO;

use App\config\Parameter;
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

    public function deleteComments($articleId)
    {
        $sql = 'DELETE FROM comment WHERE article_id=?';
        $this->createQuery($sql,[$articleId]);
    }

    ///
    ///
    ///
    public function addComment(Parameter $post, $id)
    {
        $sql = 'INSERT INTO comment (pseudo, content, createdAt, article_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'), $id
        ]);

    }

    public function deleteComment($id)
    {
        $sql = 'DELETE FROM comment WHERE id=?';
        $this->createQuery($sql,[$id]);
    }


}