<h1>Page d'administration</h1>

<p><a href="../public/index.php?route=addArticle"><i class="fas fa-edit fa-lg"></i> Nouvel Article </a></p>
<p><a href="../public/index.php?route=flagComments"> Commentaires signalés </a></p>
<p><a href="../public/index.php?route=allUsers"> Liste des utilisateurs </a></p>

<?php
foreach ($articles as $article) {
    ?>
    <div>
        <h2>
            <a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()); ?>"><?= htmlspecialchars($article->getTitle()); ?></a>
        </h2>
        <p>par <?= htmlspecialchars($article->getAuthor()); ?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt()); ?></p>
        <p><?= strip_tags($article->getExtract()); ?></p>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$article->getId() ?>">
        Supprimer l'article
    </button>

    <div class="modal fade" id="exampleModal<?=$article->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment supprimer l'article ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a href="../public/index.php?route=deleteArticle&articleId=<?= htmlspecialchars($article->getId());?>">
                        <button type="button" class="btn btn-primary">Supprimer l'article</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>