<?php $this->title = "Modifications articles"; ?>

<div class="backcolorPage zoneWriting">

    <a href="../public/index.php?route=adminPage" title="retour au tableau de bord"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
    <br><br>
    <h1>Modifier mon article</h1>

    <div>
        <form method="POST" action="../public/index.php?route=modifyArticle&articleId=<?= $article->getId();?>">
            <label for="title">Titre</label><br>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($article->getTitle());?>"><br>

            <label for="content">Contenu</label><br>
            <textarea id="content" name="content"><?= htmlspecialchars($article->getContent());?></textarea><br>

            <label for="author">Auteur</label><br>
            <input type="text" id="author" name="author" value="<?= htmlspecialchars($article->getAuthor());?>"><br>

            <button type="submit" class="btn btn-primary" id="submit" name="submit" value="Envoyer">Envoyer</button>
        </form>
    </div>


</div>

