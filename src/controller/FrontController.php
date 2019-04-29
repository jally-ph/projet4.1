<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home', [
            'articles' => $articles
        ]);
    }

    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function modifyArticle($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        return $this->view->render('modify', [
            'article' => $article
        ]);

        if($post->get('submit')) {
            //$this->session->set('modify_article', 'L\'article a bien été modifié');
            header('Location: ../public/index.php');
        }







    }


}