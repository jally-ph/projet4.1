<?php $this->title = "Modifications articles"; ?>
<h1>Modifier mon article</h1>

<a href="../public/index.php">Retour à l'accueil</a>
<?php if ($this->session->get('pseudo')=='admin'){ ?>
    <p><a href="../public/index.php?route=adminPage">Retour page d'administration</a> </p>
<?php } ?>
<!--chaq partie du form doit être rempli avec les infos déjà entrées-->


<div>
    <form method="POST" action="../public/index.php?route=modifyArticle&articleId=<?= $article->getId();?>">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($article->getTitle());?>"><br>

        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"><?= htmlspecialchars($article->getContent());?></textarea><br>

        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author" value="<?= htmlspecialchars($article->getAuthor());?>"><br>

        <input type="submit" value="Envoyer les modifications" id="submit" name="submit">
    </form>
</div>
