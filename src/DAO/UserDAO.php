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

    public function connexionUser(Parameter $post)
    {
        if (isset($post))
        {
            $pseudo = $post->get('pseudo');
            $pass = $post->get('password');

            if (isset($pseudo) && isset($pass))
            {
                $sql = 'SELECT id, password FROM user WHERE pseudo= ?';
                $result = $this->createQuery($sql, [$pseudo]);
                $user = $result->fetch();
                $result->closeCursor();
                return $user;

                $isPasswordCorrect = password_verify($pass, $user['password']);

                if(!$user)
                {
                    echo 'Pseudo sans correspondance. Vous vous êtes trompés de pseudo ?';
                }

                else
                {
                    if($isPasswordCorrect){
                        session_start();
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['pseudo'] = $pseudo;
                        echo 'Vous êtes bien connecté...mais votre lien vers la page d\'accueil ne fonctionne visiblement pas';
                    }

                    else{
                            echo 'Password incorrect ou pseudo sans correspondance.';
                    }

                }
            }


        }



        /*$sql = 'SELECT pseudo, password FROM user WHERE id = ?';
        $result = $this->createQuery($sql, [$id]);
        $user = $result->fetch();
        $result->closeCursor();
        return $user;*/
    }
}