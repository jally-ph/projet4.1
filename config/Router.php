<?php

namespace App\config;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        try{
            if(isset($route))
            {
                if($route === 'article'){
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                elseif ($route === 'addArticle'){
                    $this->backController->addArticle($this->request->getPost());
                }

                elseif ($route === 'deleteArticle') {
                    $this->backController->deleteArticle($this->request->getGet()->get('articleId'));
                }

                elseif ($route === 'modifyArticle') {
                    $this->backController->modifyArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }

                //pour les commentaires

                elseif ($route === 'addComment'){
                    $this->backController->addComment($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }

                elseif ($route === 'suppComment'){
                    $this->backController->suppComment($this->request->getGet()->get('commentId'));
                }

                elseif ($route === 'modifyComment'){
                    $this->backController->modifyComment($this->request->getPost(), $this->request->getGet()->get('commentId'));
                }

                elseif($route === 'flagComment'){
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'));
                }

                elseif ($route === 'flagComments'){
                    $this->frontController->flagComments($this->request->getGet()->get('commentId'));
                }

                elseif ($route === 'deflag'){
                    $this->frontController->deflag($this->request->getGet()->get('commentId'));
                }




                //pour les utilisateurs

                elseif ($route === 'inscriptionUser'){
                    $this->backController->inscriptionUser($this->request->getPost());
                }

                elseif ($route === 'connexionUser'){
                    $this->backController->connexionUser($this->request->getPost());
                }

                elseif ($route === 'Deconnexion'){
                    $this->backController->Deconnexion($this->request->getSession());
                }

                elseif ($route === 'removeUser'){
                    $this->backController->removeUser($this->request->getSession(), $this->request->getGet()->get('userId'));
                }

                elseif ($route === 'allUsers'){
                    $this->frontController->allUsers($this->request->getGet()->get('userId'));
                }

                elseif ($route === 'deleteUser'){
                    $this->frontController->deleteUser($this->request->getGet()->get('userId'));
                }


                //page d'administration

                elseif ($route === 'adminPage'){
                    $this->backController->adminPage();
                }

                //autres pages (contact, en savoir plus)

                elseif ($route === 'contactPage'){
                    $this->frontController->contactPage();
                }

                elseif ($route === 'infosPage'){
                    $this->frontController->infosPage();
                }



                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}