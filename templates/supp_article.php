<h1>Articles supprimées</h1>

<a href="../public/index.php">Retour à l'accueil</a>
<h3>Liste articles supprimées</h3>

<?php
echo $result;

while ($archive)
{
    ?>
    <div>
        <h2><a href="../public/index.php?route=getArchive=<?= htmlspecialchars($archive->getId());?>"><?= htmlspecialchars($archive->getTitle());?></a></h2>
        <p><?= htmlspecialchars($archive->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($archive->getCreatedAt());?></p>
    </div>


<?php
}
?>


