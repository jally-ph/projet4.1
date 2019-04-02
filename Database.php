<?php

class Database
{
    //Nos constantes
    const DB_HOST = 'mysql:host=localhost;dbname=projet4.1;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    //Méthode de connexion à notre base de données
    public function getConnection()
    {
        //Tentative de connexion à la base de données
        try{
            $connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On renvoie un message avec le mot-clé return
            return 'Connexion OK';
        }
            //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }

    }
}

