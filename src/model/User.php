<?php


namespace App\src\model;


class User extends SetGet
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \DateTime
     */
    private $createdAt;



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