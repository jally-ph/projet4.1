<?php

namespace App\src\controller;

use App\config\Parameter;


class BackController extends Controller
{
    //
    private function checkAdmin()
    {
        if($this->session->get('pseudo')=='admin') {
           return true;
        }

        else {
            header('Location:../public/index.php?route=connexionUser');
        }

    }

    //
    public function addArticle(Parameter $post)
    {
        if($this->checkAdmin()){
            if($post->get('submit')) {
                $this->articleDAO->addArticle($post);
                $this->session->set('add_article', 'Le nouvel article a bien été ajouté');
                header('Location: ../public/index.php');
            }
            
            return $this->view->render('add_article', [
                'post' => $post
            ]);
        }

    }

    public function deleteArticle($articleId)
    {
        if($this->checkAdmin()){

            $this->commentDAO->deleteComments($articleId);
            $this->articleDAO->deleteArticle($articleId);
            $this->session->set('delete_article', 'L\'article a bien été supprimé');
            header('Location: ../public/index.php?route=adminPage');
        }


    }


    public function modifyArticle(Parameter $post, $id)
    {
        if($this->checkAdmin()){
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

        if(!$this->checkAdmin()){

                //$id = $this->commentDAO->getCommentId($id);

                $article_id = $this->commentDAO->getArticleIdForComment($id);

                $this->commentDAO->deleteComment($id);

                header('Location: ../public/index.php?route=article&articleId='.$article_id[0]);


        }


    }

    public function modifyComment(Parameter $post, $id)
    {
        if($this->checkAdmin()){
            //récupérer le commentaire
            $comment = $this->commentDAO->getComment($id);

            if($post->get('submit')) {
                $this->commentDAO->modifyComment($post, $id);
                $article_id = $this->commentDAO->getArticleIdForComment($id);
                header('Location: ../public/index.php?route=article&articleId='.$article_id[0]);
            }

            return $this->view->render('modifyComment', [
                'comment' => $comment
            ]);

        }

    }

    //pour les utilisateurs

    public function inscriptionUser(Parameter $post)
    {

        if($post->get('submit')) {
            //var_dump($post);

            //vérifier que pseudo et pass n'existe pas déjà dans la bdd avant d'insérer
            $verify = $this->userDAO->verifyPseudo($post);
            //var_dump($verify);

            if(!$verify) {
                $this->userDAO->inscriptionUser($post);
                $this->session->set('inscriptionNewUser', 'Bienvenue ! Vous avez le statut de Nouveau Membre. 
            Connectez-vous à votre compte.');
                header('Location: ../public/index.php');
            }
            else {
             $this->session->set('verifyPseudo', 'Ce pseudo est déjà pris');
            }
        }

        return $this->view->render('inscription', [
            'post' => $post
        ]);
    }



    public function removeSessionIdPseudo()
    {
        $this->session->get('id');
        $this->session->get('pseudo');
        $this->session->remove('id');
        $this->session->remove('pseudo');

    }


    public function connexionUser(Parameter $post)
    {

        if($post->get('submit')) {

            $result = $this->userDAO->connexionUser($post);

            if(!$result['user'])
            {

                $this->session->set('incorrectPassword', 'Password ou pseudo incorrect');
                $this->removeSessionIdPseudo();

                header('Location: ../public/index.php');
            }
            elseif(!$result['isPasswordCorrect']){

                $this->session->set('incorrectPassword2', 'Password incorrect');
                $this->removeSessionIdPseudo();

                header('Location: ../public/index.php');
            }

            else
            {
                if($result['isPasswordCorrect']){
                    $this->session->set('id', $result['user']['id']);
                    $this->session->set('pseudo', $result['user']['pseudo']);
                    $this->session->set('successfulConnexion', 'Bienvenue !');



                    header('Location: ../public/index.php');
                }

                else{

                    $this->session->get('incorrectPassword');
                    $this->removeSessionIdPseudo();

                    header('Location: ../public/index.php');

                }
            }
        }


        return $this->view->render('connexion', [
            'post' => $post
        ]);
    }


    public function Deconnexion()
    {
        $this->session->stop();
        header('Location: ../public/index.php');
    }

    public function removeUser()
    {
        //récup id
        $id = $this->session->get('id');

        //supp from the user id
        $this->userDAO->suppUser($id);

        $this->removeSessionIdPseudo();
        $this->session->set('suppUser', 'Votre compte a bien été supprimé.');
        header('Location: ../public/index.php');

    }


    public function adminPage()
    {
        if($this->checkAdmin()){

            //$comment = $this->commentDAO->getComment($id);

            $articles = $this->articleDAO->getArticles();

            return $this->view->render('adminPage', [
                'articles'=> $articles
                //'comment'=> $comment
            ]);
        }
    }

}