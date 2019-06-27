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

    public function flagComment($commentId)
    {
        $this->commentDAO->flagComment($commentId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header('Location: ../public/index.php');
    }

    public function flagComments($articleId)
    {
        $comments = $this->commentDAO->flagComments($articleId);
        return $this->view->render('commentSignal', [
            'comments' => $comments
        ]);
    }

    public function deflag($commentId)
    {
        $this->commentDAO->deflag($commentId);
        $this->session->set('deflag', 'Le commentaire n\'est plus signalé');
        header('Location: ../public/index.php?route=flagComments');
    }

    public function allUsers($userId)
    {
        $users = $this->userDAO->allUsers($userId);
        return $this->view->render('listUsers', [
            'users' => $users
        ]);
    }

    public function deleteUser($id)
    {
        $this->userDAO->suppUser($id);
        header('Location: ../public/index.php?route=allUsers');
    }

    //autres pages : contact, infos=en savoir plus

    public function contactPage()
    {
        return $this->view->render('contact');
    }

    public function infosPage()
    {
        return $this->view->render('infos');
    }


}