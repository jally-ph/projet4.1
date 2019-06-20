<?php $this->title = "Article"; ?>
<h1>Mon blog</h1>
<p>En construction</p><br>

<?= $this->session->show('modify_article'); ?>

<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p>par <?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
    <p><?= $article->getContent();?></p>


    <?php if ($this->session->get('pseudo')=='admin'){ ?>
    <a href="../public/index.php?route=modifyArticle&articleId=<?= htmlspecialchars($article->getId());?>">
    Modifier l'article
    </a>
    <?php } ?>

</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>
<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Commentaires</h3>
    <a href="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId());?>">Ajouter un commentaire</a>

    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo()); ?></h4>
        <p><?= $comment->getContent(); ?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt()); ?></p>
        <?php ?>


        <?php //if ($this->session->get('pseudo')=='admin')
        //{
        var_dump($comment->getId());
        ?>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $comment->getId();?>">
                Supprimer le commentaire<?= $comment->getId();?>
            </button>

            <div class="modal fade" id="exampleModal<?= $comment->getId();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment supprimer le commentaire ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <?= $comment->getId();?><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...<?= $comment->getId();?>
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


            <br>
            <a href="../public/index.php?route=modifyComment&commentId=<?=htmlspecialchars($comment->getId());?>">
                Modifier le commentaire
            </a>
            <?php
        //}



        if($comment->isFlag())
        {
            ?>
            <p>Ce commentaire a déjà été signalé</p>
            <?php
        }
        else
        {
            ?>
            <p><a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire<?= $comment->getId(); ?></a>
            </p>
            <?php
        }


    }
        ?>







    <br>

</div>