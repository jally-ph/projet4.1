<h1>Tableau de bord</h1>

<div class="sessionMsg">

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
</div>

<div class="toolsAdminPage">
    <p class="square"><a href="../public/index.php?route=addArticle"><i class="fas fa-edit fa-lg"></i> Nouvel Article </a></p>
    <p class="square"><a href="../public/index.php?route=flagComments"><i class="fas fa-exclamation-triangle fa-lg"></i> Commentaires signalés </a></p>
    <p class="square"><a href="../public/index.php?route=allUsers"><i class="fas fa-user fa-lg"></i> Liste des utilisateurs </a></p>
</div>


<div class="zoneArticlesAdmin">
    <?php
    foreach ($articles as $article)
    {
        ?>

        <div class="card homeCard" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">
                        <?= htmlspecialchars($article->getTitle());?></a></h5>
                <p class="card-text"><?= strip_tags($article->getExtract());?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">par <?= htmlspecialchars($article->getAuthor());?></li>
                <li class="list-group-item">Créé le : <?= htmlspecialchars($article->getCreatedAt());?></li>
            </ul>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$article->getId() ?>">
                <i class="fas fa-trash-alt"></i> Supprimer l'article
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

        </div>

        <br>


        <?php
    }
    ?>
</div>
