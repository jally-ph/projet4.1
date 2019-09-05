<?php

namespace App\src\model;

use App\src\model\Content;
use App\src\model\Pseudo;

class Comment extends Model
{

    /**
     * @var bool
     */
    private $flag;


 

    /**
     * @return bool
     */
    public function isFlag()
    {
        return $this->flag;
    }

    /**
     * @param bool $flag
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

}