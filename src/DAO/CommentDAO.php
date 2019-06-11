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
        $comment->setFlag($row['flag']);
        return $comment;
    }

    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt, flag FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function getComment($commentId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt, article_id FROM comment WHERE id = ?';
        $result = $this->createQuery($sql, [$commentId]);
        $comment = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($comment);
    }

    public function getArticleIdForComment($id)
    {
        $sql = 'SELECT article_id FROM comment WHERE id = ?';
        $result = $this->createQuery($sql, [$id]);
        $comment = $result->fetch();
        $result->closeCursor();
        return $comment;
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
        $sql = 'INSERT INTO comment (pseudo, content, flag, createdAt, article_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'), 0, $id
        ]);

    }

    public function deleteComment($id)
    {
        $sql = 'DELETE FROM comment WHERE id=?';
        $this->createQuery($sql,[$id]);
    }

    public function modifyComment(Parameter $post, $id)
    {
        $sql = 'UPDATE comment SET pseudo=:pseudo, content=:content WHERE id=:id';
        $this->createQuery($sql, [
            'pseudo'=>$post->get('pseudo'),
            'content'=>$post->get('content'),
            'id'=>$id
        ]);
    }

    public function flagComment($commentId)
    {
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }

}