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