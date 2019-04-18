<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('add_article'); ?>
<p><a href="../public/index.php?route=addArticle">Nouvel article</a> </p>

<!--articles supprimées-->
<p><a href="../public/index.php?route=getArchive">Voir les articles supprimées</a> </p>

<?php
foreach ($articles as $article)
{
    ?>
    <div>
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
    </div>
    <br>
    <?php
}
?>