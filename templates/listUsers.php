<h1>liste des utilisateurs</h1>

<p><a href="../public/index.php?route=adminPage">Retour page d'administration</a> </p>

<?php
foreach ($users as $user)
{
?>
    <h5><?= htmlspecialchars($user->getPseudo());?></h5>
    <p>Arrivé le <?= htmlspecialchars($user->getCreatedAt());?></p>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$user->getId() ?>">
        Supprimer l'utilisateur
    </button>

    <div class="modal fade" id="exampleModal<?=$user->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment supprimer l'utilisateur ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a href="../public/index.php?route=deleteUser&userId=<?= htmlspecialchars($user->getId());?>">
                        <button type="button" class="btn btn-primary">Supprimer l'utilisateur</button>
                    </a>
                </div>
            </div>
        </div>
    </div>


<?php } ?>