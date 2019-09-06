<?php
namespace App\src\model;


class User extends Model
{

    /**
     * @var string
     */
    private $password;

    private $pseudo;



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

         /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }


  
}