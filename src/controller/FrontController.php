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

    public function reduireChaineCar($chaine, $nb_car, $delim='...') {
        $chaine= $this->articleDAO->getArticle();
        $length = $nb_car;
        if($nb_car<strlen($chaine)){
            while (($chaine{$length} != " ") && ($length > 0)) {
                $length--;
            }
            if ($length == 0) {return substr($chaine, 0, $nb_car) . $delim;}
            else {return substr($chaine, 0, $length) . $delim;}
        }
        else {
            return $chaine;}
    }


}