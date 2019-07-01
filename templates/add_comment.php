<?php $this->title = "Nouveau commentaire"; ?>

<div class="backcolorPage zoneWriting">

    <a href="../public/index.php?route=adminPage" title="retour au tableau de bord"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
    <br><br>
    <h1>Nouveau commentaire</h1>

    <div>
        <form method="post" action="../public/index.php?route=addComment&articleId=<?= $article->getId();?>">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo"><br>

            <label for="content">Contenu</label><br>
            <textarea id="content" name="content"></textarea><br>

            <button type="submit" class="btn btn-primary" id="submit" name="submit" value="Envoyer">Envoyer</button>
        </form>

    </div>

</div>




