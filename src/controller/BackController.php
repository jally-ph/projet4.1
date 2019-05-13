<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    public function addArticle(Parameter $post)
    {
        if($post->get('submit')) {
            $this->articleDAO->addArticle($post);
            $this->session->set('add_article', 'Le nouvel article a bien été ajouté');
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_article', [
            'post' => $post
        ]);
    }

    public function deleteArticle($articleId)
    {
        $this->commentDAO->deleteComments($articleId);
        $this->articleDAO->deleteArticle($articleId);
        $this->session->set('delete_article', 'L\'article a bien été supprimé');
        header('Location: ../public/index.php');
    }


    public function modifyArticle(Parameter $post, $id)
    {
        $article = $this->articleDAO->getArticle($id);

        //var_dump($post);

        if($post->get('submit')) {
            $this->articleDAO->updateArticle($post, $id);
            $this->session->set('modify_article', 'L\'article a bien été modifié');
            header('Location: ../public/index.php?route=article&articleId='.$id);
        }

        return $this->view->render('modify', [
            'article' => $article
        ]);

    }

//pour les commentaires

    public function addComment(Parameter $post, $id)
    {
        $article = $this->articleDAO->getArticle($id);

        if($post->get('submit')) {
            $this->commentDAO->addComment($post, $id);
            $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
            header('Location: ../public/index.php?route=article&articleId='.$id);

        }
        return $this->view->render('add_comment', [
            'article'=> $article
        ]);
    }

    public function suppComment($id)
    {
        $article_id = $this->commentDAO->getArticleIdForComment($id);
        $this->commentDAO->deleteComment($id);
        header('Location: ../public/index.php?route=article&articleId='.$article_id[0]);
    }

    public function modifyComment(Parameter $post, $commentId)
    {
        //récupérer le commentaire
        $comment = $this->commentDAO->getComment($commentId);


        if($post->get('submit')) {
            $this->commentDAO->modifyComment($post, $commentId);
            $id=$commentId;
            $article_id = $this->commentDAO->getArticleIdForComment($id);
            header('Location: ../public/index.php?route=article&articleId='.$article_id[0]);
        }

        return $this->view->render('modifyComment', [
            'comment' => $comment
        ]);
    }


}