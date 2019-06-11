<?php $this->title = "Commentaires signalés"; ?>

<?php
foreach ($comments as $comment)
{
?>
<h4><?= htmlspecialchars($comment->getPseudo());?></h4>
<p><?= $comment->getContent();?></p>
<p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>

<?php } ?>
