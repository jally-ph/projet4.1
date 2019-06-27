<?php $this->title = "Modification du commentaire"; ?>
<h1>Modifier mon commentaire</h1>

<a href="../public/index.php">Retour à l'accueil</a>

<?php if ($this->session->get('pseudo')=='admin'){ ?>
    <p><a href="../public/index.php?route=adminPage">Retour page d'administration</a> </p>
<?php } ?>


<div>
    <form method="POST" action="../public/index.php?route=modifyComment&commentId=<?= $comment->getId();?>">
        <label for="title">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($comment->getPseudo());?>"><br>

        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"><?= htmlspecialchars($comment->getContent());?></textarea><br>

        <input type="submit" value="Envoyer les modifications" id="submit" name="submit">
    </form>
</div>
