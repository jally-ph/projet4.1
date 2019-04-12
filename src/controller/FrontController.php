<?php

namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;

class FrontController
{
    private $articleDAO;
    private $commentDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
    }

    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        require '../templates/home.php';
    }

    public function article($articleId)
    {
        $articles = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        require '../templates/single.php';
    }
}