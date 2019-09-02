<?php

namespace App\src\model;

use App\config\Request;

class View
{
    private $file;
    private $title;
    private $request;
    private $session;

    public function __construct()
    {
        $this->request = new Request();
        $this->session = $this->request->getSession();
    }



   private function renderFile($file, $data)
    {
        if(file_exists($file)){
            //key no collision
            extract($data);
            //temporisation 
            ob_start();
            require $file;
            return ob_get_clean();
        }

        header('Location: index.php?route=notFound');
    }



    public function render($template, $data = [])
    {
        //link
        $this->file = '../templates/'.$template.'.php';
        //récup content
        $content  = $this->renderFile($this->file, $data);
        //récup base
        $view = $this->renderFile('../templates/base.php', [
            'title' => $this->title,
            'content' => $content,
            'session' => $this->session
        ]);
        echo $view;
    }

 
}