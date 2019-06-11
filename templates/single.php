<?php $this->title = "Article"; ?>
<h1>Mon blog</h1>
<p>En construction</p><br>

<?= $this->session->show('modify_article'); ?>

<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p>par <?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
    <p><?= $article->getContent();?></p>


    <?php if ($this->session->get('pseudo')=='admin'){ ?>
    <a href="../public/index.php?route=modifyArticle&articleId=<?= htmlspecialchars($article->getId());?>">
    Modifier l'article
    </a>
    <?php } ?>

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
        <?php
        if($comment->isFlag()) {
            ?>
            <p>Ce commentaire a déjà été signalé</p>
            <?php
        } else {
            ?>
            <p><a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
            <?php
        }
        ?>


    <?php if ($this->session->get('pseudo')=='admin'){ ?>
    <a href="../public/index.php?route=suppComment&commentId=<?= htmlspecialchars($comment->getId());?>">
        Supprimer le commentaire
    </a> <br>
    <a href="../public/index.php?route=modifyComment&commentId=<?=htmlspecialchars($comment->getId());?>">
        Modifier le commentaire
    </a>
    <?php } ?>

    <br>
        <?php
    }
    ?>
</div>