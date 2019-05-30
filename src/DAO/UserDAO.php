<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;


class UserDAO extends DAO
{
    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setPassword($row['password']);
        $user->setCreatedAt($row['createdAt']);
        return $user;
    }

    public function inscriptionUser(Parameter $post)
    {
        $pass = password_hash($post->get('password'), PASSWORD_DEFAULT);
        $sql = 'INSERT INTO user (pseudo, password, createdAt) VALUES (?, ?, NOW())';
        $this->createQuery($sql, [$post->get('pseudo'), $pass]);

    }

    public function verifyPseudo(Parameter $post)
    {
        $pseudo = $post->get('pseudo');

        $sql='SELECT pseudo FROM user WHERE pseudo= ?';
        $result = $this->createQuery($sql, [$pseudo]);
        $verify = $result->fetch();
        $result->closeCursor();

        if ($verify){
            return [
                'verify' => $verify
            ];
        }



    }


    public function connexionUser(Parameter $post)
    {

        $pseudo = $post->get('pseudo');
        $pass = $post->get('password');

        $sql = 'SELECT id, pseudo, password FROM user WHERE pseudo= ?';
        $result = $this->createQuery($sql, [$pseudo]);
        $user = $result->fetch();
        $result->closeCursor();


        $isPasswordCorrect = password_verify($pass, $user['password']);
        //var_dump($isPasswordCorrect);

        return [
            'user'=> $user,
            'isPasswordCorrect' => $isPasswordCorrect
            ];

    }

    public function suppUser($id)
    {
        $sql = 'DELETE FROM user WHERE id=?';
        $this->createQuery($sql,[$id]);
    }
}