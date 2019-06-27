<?php $this->title = "Nouvel article"; ?>

<div class="backcolorPage zoneWriting">

    <a href="../public/index.php?route=adminPage" title="retour au tableau de bord"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
    <br><br>
    <h1>Nouvel article</h1>

    <div>

        <form method="post" action="../public/index.php?route=addArticle">
            <label for="title">Titre</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="content">Contenu</label><br>
            <textarea id="content" name="content"></textarea><br>
            <label for="author">Auteur</label><br>
            <input type="text" id="author" name="author"><br><br>
            <button type="submit" class="btn btn-primary" id="submit" name="submit" value="Envoyer">Envoyer</button>
        </form>

    </div>

</div>

