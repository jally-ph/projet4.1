<?php $this->title = "Modification du commentaire"; ?>




<div class="backcolorPage zoneWriting">

    <a href="../public/index.php?route=adminPage" title="retour au tableau de bord"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
    <br><br>
    <h1>Modifier mon commentaire</h1>

    <div>
        <form method="POST" action="../public/index.php?route=modifyComment&commentId=<?= $comment->getId();?>">
            <label for="title">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($comment->getPseudo());?>"><br>

            <label for="content">Contenu</label><br>
            <textarea id="content" name="content"><?= htmlspecialchars($comment->getContent());?></textarea><br>

            <button type="submit" class="btn btn-primary" id="submit" name="submit" value="Envoyer">Envoyer</button>
        </form>
    </div>


</div>

