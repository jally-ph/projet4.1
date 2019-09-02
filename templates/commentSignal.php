<?php $this->title = "Commentaires signalés";
?>

<section class="backcolorPage zoneWriting">

    <p><a href="../public/index.php?route=adminPage" title="retour au tableau de bord">
            <i class="fas fa-arrow-circle-left fa-2x"></i>
        </a>
    </p>


    <h2>Commentaires signalés</h2>
    <br>

    <p><?= $this->session->show('deflag'); ?></p>

    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= $comment->getContent();?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$comment->getId() ?>">
            Retirer le signalement
        </button>

        <div class="modal fade" id="exampleModal<?=$comment->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment retirer le signalement ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        
                        <a href="../public/index.php?route=deflag&commentId=<?= htmlspecialchars($comment->getId());?>" class="btn btn-primary">
                            Retirer le signalement
                            
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>

        <hr>

    <?php } ?>


</section>



