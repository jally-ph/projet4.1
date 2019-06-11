
<h1>Mon blog</h1>
<p>En construction</p>

<?php var_dump($this->session); ?>
<?= $this->session->get('pseudo'); ?> <br>
<?= $this->session->get('id');?><br>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('delete_comments'); ?>
<?= $this->session->show('inscriptionNewUser'); ?>
<?= $this->session->show('connexionUser'); ?>
<?= $this->session->show('successfulConnexion'); ?>
<?= $this->session->show('incorrectPassword'); ?>
<?= $this->session->show('incorrectPassword2'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('suppUser'); ?>



<?php if ($this->session->get('pseudo')=='admin'){ ?>
    <p><a href="../public/index.php?route=addArticle">Nouvel article</a></p>
<?php } ?>
<!--<p><a href="../public/index.php?route=addArticle">Nouvel article</a> </p>-->

<p><a href="../public/index.php?route=inscriptionUser">S'inscrire</a> </p>
<p><a href="../public/index.php?route=connexionUser">Se connecter</a> </p>
<p><a href="../public/index.php?route=removeUser&userId=<?= $this->session->get('id');?>">Supprimer mon compte</a> </p>
<p><a href="../public/index.php?route=Deconnexion">Deconnexion</a> </p>

<?php
foreach ($articles as $article)
{
    ?>
    <div>
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p>par <?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
        <p><?= strip_tags($article->getExtract());?></p



        <?php if ($this->session->get('pseudo')=='admin'){ ?>
            <a></a>
            <a href="../public/index.php?route=deleteArticle&articleId=<?= htmlspecialchars($article->getId());?>">
                Supprimer l'article
            </a>
        <?php } ?>

    </div>
    <br>
    <?php
}
?>