<?php
?>

<nav class="navbar navbar-expand-lg navbar-light bg-lighty">

    <div id="logoJF">
            <a href="../public/index.php" >
                <img src="../public/img/logoJF.png" >
            </a>

    </div>
    <?= $this->session->get('pseudo'); ?>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

            <?php if ($this->session->get('pseudo')=='admin')
            {
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../public/index.php?route=adminPage"> Tableau de bord </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../public/index.php?route=addArticle"><i class="fas fa-edit "></i> Nouvel Article </a>
                </li>

            <?php } ?>

            <li class="nav-item active">
                <a class="nav-link" href="../public/index.php">
                    Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../public/index.php?route=infosPage">En savoir plus <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../public/index.php?route=contactPage">Contact <span class="sr-only">(current)</span></a>
            </li>


    <!--dropdown-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Espace membre
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../public/index.php?route=inscriptionUser">S'inscrire</a>
                    <a class="dropdown-item" href="../public/index.php?route=connexionUser">Se connecter</a>
                    <a class="dropdown-item" href="../public/index.php?route=removeUser&userId=<?= $this->session->get('id');?>">Supprimer mon compte</a>
                    <a class="dropdown-item" href="../public/index.php?route=Deconnexion">Déconnexion</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

