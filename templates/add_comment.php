<h1>Ajouter votre commentaire</h1>

<div>
    <form method="post" action="../public/index.php?route=addComment&articleId=<?= $article->getId();?>">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>

        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"></textarea><br>

        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>

