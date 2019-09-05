<?php

namespace App\src\model;


class Pseudo {

	/**
     * @var string
     */
    protected $pseudo;



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

    