<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('delete_comments'); ?>
<?= $this->session->show('modify_article'); ?>
<?php //créer une session avec message : "article modifié" ?>

<p><a href="../public/index.php?route=addArticle">Nouvel article</a> </p>

<p><a href="../public/index.php?route=modifyArticle&articleId">Test modif</a> </p>
<?php
//var_dump(modifyArticle());?>

<?php
foreach ($articles as $article)
{
    ?>
    <div>
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
        <p><a href="../public/index.php?route=deleteArticle&articleId=<?= htmlspecialchars($article->getId());?>">Supprimer cet article</a></p>
    </div>
    <br>
    <?php
}
?>