<?php

namespace App\src\model;

use App\src\model\Content;



class Article extends Model {
   
    /**
     * @var string
     */
    private $title;


    /**
    * @var string
    */
    private $chain;


    /**
     * @var string
     */
    private $author;




    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function getExtract()
    {
        $chain = $this->getContent();
        return substr($chain, 0, 200) . "...";
    }


    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

   
}