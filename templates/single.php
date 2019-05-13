<?php $this->title = "Article"; ?>
<h1>Mon blog</h1>
<p>En construction</p><br>

<?= $this->session->show('modify_article'); ?>

<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>


    <p><a href="../public/index.php?route=modifyArticle&articleId=<?= htmlspecialchars($article->getId());?>">Modifier l'article</a></p>

</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>
<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Commentaires</h3>
    <a href="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId());?>">Ajouter un commentaire</a>

    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
        <a href="../public/index.php?route=suppComment&commentId=<?= htmlspecialchars($comment->getId());?>
">Supprimer le commentaire</a>
        <br><br>
        <a href="../public/index.php?route=modifyComment&commentId=<?=htmlspecialchars($comment->getId());?>">Modifier le commentaire</a>
        <?php
    }
    ?>
</div>