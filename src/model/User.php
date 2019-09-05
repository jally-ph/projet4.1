<?php


namespace App\src\model;

use App\src\model\Pseudo;


class User extends Model
{

    /**
     * @var string
     */
    private $password;



    /**
     * @return Password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /*
     * @param string password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

  
}