<?php $this->title = "Article"; ?>
<h1>Mon blog</h1>
<p>En construction</p><br>

<?= $this->session->show('modify_article'); ?>

<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p>par <?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
    <p><?= $article->getContent();?></p>


    <?= $this->session->get('modifyArticle'); ?>

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
        <p><?= $comment->getContent();?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>

        <?= $this->session->get('suppComment'); ?>
        <?= $this->session->get('modifyComment'); ?>

        <br><br>
        <?php
    }
    ?>
</div>