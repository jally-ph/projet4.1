<?php


namespace App\src\DAO;

use App\src\model\Archive;
use App\src\model\Article;

class ArchiveDAO
{
    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setCreatedAt($row['createdAt']);
        return $archives;
    }

    /**
     * function display articles _ @return string
     */
    public function getArchive()
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM archive';
        $result = $this->createQuery($sql);
        $archives = [];
        foreach ($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $archives;
    }

    /**
     * function suppress article _ @return string
     */
    public function suppArticle()
    {
        $sql = 'DELETE FROM archive WHERE id = ?';
        $sql->closeCursor();
        return "Cet article a bien été supprimé";
    }


}