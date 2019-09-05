<?php

namespace App\src\model;


class Content {

    /**
     * @var string
     */
    protected $content;


 

     /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }


}