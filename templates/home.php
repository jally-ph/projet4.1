<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('delete_comments'); ?>
<?= $this->session->show('inscriptionNewUser'); ?>
<?= $this->session->show('connexionUser');
echo $user->getPseudo(); ?>


<p><a href="../public/index.php?route=addArticle">Nouvel article</a> </p>
<p><a href="../public/index.php?route=inscriptionUser">S'inscrire</a> </p>
<p><a href="../public/index.php?route=connexionUser">Se connecter</a> </p>

<?php
foreach ($articles as $article)
{
    ?>
    <div>
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p>par <?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
        <p><?= $article->getContent();?></p

        <p><a href="../public/index.php?route=deleteArticle&articleId=<?= htmlspecialchars($article->getId());?>">Supprimer cet article</a></p>
    </div>
    <br>
    <?php
}
?>