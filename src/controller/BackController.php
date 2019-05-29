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

    public function modifyComment(Parameter $post, $id)
    {
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


    //pour les utilisateurs

    public function inscriptionUser(Parameter $post)
    {

        if($post->get('submit')) {
            var_dump($post);
            $this->userDAO->inscriptionUser($post);
            $this->session->set('inscriptionNewUser', 'Bienvenue ! Vous avez le statut de Nouveau Membre.');
            header('Location: ../public/index.php');
        }

        return $this->view->render('inscription', [
            'post' => $post
        ]);
    }


    public function connexionUser($post)
    {

        if($post->get('submit')) {

            $result = $this->userDAO->connexionUser($post);

            if(!$result['user'])
            {
                $this->session->set('incorrectPassword', 'Password incorrect ou pseudo sans correspondance');
                header('Location: ../public/index.php');
            }

            else
            {
                if($result['isPasswordCorrect']){
                    $this->session->set('id', $result['user']['id']);
                    $this->session->set('pseudo', $post->get('pseudo'));
                    $this->session->set('successfulConnexion', 'Bienvenue !');

                    //Tools only for the admin
                    if ($_SESSION['pseudo']=='admin'){

                        $this->session->set('newArticle', '<p><a href="../public/index.php?route=addArticle">Nouvel article</a></p>');
                        $this->session->set('suppArticle', '<p><a href="../public/index.php?route=deleteArticle&articleId=<?= htmlspecialchars($article->getId());?>">Supprimer cet article</a></p>');
                        $this->session->set('modifyArticle', '<p><a href="../public/index.php?route=modifyArticle&articleId=<?= htmlspecialchars($article->getId());?>">Modifier l\'article</a></p>');
                        $this->session->set('suppComment', '<p><a href="../public/index.php?route=suppComment&commentId=<?= htmlspecialchars($comment->getId());?>
">Supprimer le commentaire</a></p>');
                        $this->session->set('modifyComment', '<a href="../public/index.php?route=modifyComment&commentId=<?=htmlspecialchars($comment->getId());?>">Modifier le commentaire</a>');

                        header('Location: ../public/index.php');
                    }
                    //Remove admin'Tools for not appear for others users
                    else{
                        $this->session->remove('newArticle');
                        $this->session->remove('suppArticle');
                        $this->session->remove('modifyArticle');
                        $this->session->remove('suppComment');
                        $this->session->remove('modifyComment');
                        header('Location: ../public/index.php');
                    }
                    header('Location: ../public/index.php');
                }

                else{
                    $this->session->get('incorrectPassword');
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

        header('Location: ../public/index.php');

    }


}