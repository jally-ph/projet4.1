<?php $this->title = "Article"; ?>


<?= $this->session->show('modify_article'); ?>

<div class="zoneArticle">
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p>par <?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
    <p><?= $article->getContent();?></p>


    <div class="toolsAdminComments">
        <?php if ($this->session->get('pseudo')=='admin'){ ?>
            <p class="toolsAdmin"><a href="../public/index.php?route=modifyArticle&articleId=<?= htmlspecialchars($article->getId());?>">
                    <i class="fas fa-pencil-alt"></i> Modifier l'article </a></p>

            <p class="toolsAdmin"><a href="../public/index.php?route=adminPage">Retour page d'administration</a> </p>
            <p class="toolsAdmin"><a href="../public/index.php">Retour à l'accueil</a></p>
        <?php } ?>

    </div>
</div>

<hr>


<div id="zoneComments" >

    <h3>Commentaires</h3>
    <p class="toolAddComment">
        <a href="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId());?>">
            <i class="fas fa-edit fa-lg"></i> Ajouter un commentaire</a>
    </p>


    <?php
    foreach ($comments as $comment)
    {
        ?>
        <!--div pr mettre les com-->
        <div>
            <h4><?= htmlspecialchars($comment->getPseudo()); ?></h4>
            <p><?= $comment->getContent(); ?></p>
            <p>Posté le <?= htmlspecialchars($comment->getCreatedAt()); ?></p>






        <?php if ($this->session->get('pseudo')=='admin')
        {

        ?>
        <div class="toolsAdminComments">
            <!--bouton suppression-->

            <button type="button" class="btn btn-primary toolsAdmin" data-toggle="modal" data-target="#exampleModal<?= $comment->getId();?>">
                <i class="fas fa-trash-alt"></i> Supprimer
            </button>

            <div class="modal fade" id="exampleModal<?= $comment->getId();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment supprimer le commentaire ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <a href="../public/index.php?route=suppComment&commentId=<?= $comment->getId();?>">
                                <button type="button" class="btn btn-primary">Supprimer le commentaire</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--modifier comments-->


            <p class="toolsAdmin">
                <a href="../public/index.php?route=modifyComment&commentId=<?=htmlspecialchars($comment->getId());?>">
                    <i class="fas fa-pencil-alt"></i> Modifier
                </a>
            </p>
            <?php
        }

            //signaler comments
        if($comment->isFlag())
        {
            ?>
            <p>&nbsp; &nbsp;Commentaire déjà signalé</p>
            <?php
        }
        else
        {
            ?>
            <p class="toolsAdmin">
                <a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">
                    <i class="fas fa-exclamation-triangle"></i> Signaler</a>
            </p>

            <?php
        }?>

        </div>

        <hr>

    <?php

    }
        ?>
    </div>
    <br>

</div>