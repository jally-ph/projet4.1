

<aside>
    <?= $this->session->show('add_article'); ?>
    <?= $this->session->show('inscriptionNewUser'); ?>
    <?= $this->session->show('connexionUser'); ?>
    <!-- welcome 
        $this->session->show('successfulConnexion');-->
    <?= $this->session->show('incorrectPassword'); ?>
    <?= $this->session->show('incorrectPassword2'); ?>
    <?= $this->session->show('flag_comment'); ?>
    <?= $this->session->show('suppUser'); ?>
</aside>


<section>

    <h3 class="invisible">Bienvenue !</h3>

        <div class="zoneArticles">

        <?php
        foreach ($articles as $article)
        {
            ?>


            <article class="card homeCard" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">
                            <?= htmlspecialchars($article->getTitle());?></a></h5>
                    <p class="card-text"><?= strip_tags($article->getExtract());?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <!--<li class="list-group-item">par <?= htmlspecialchars($article->getAuthor());?></li>-->
                    <li class="list-group-item">Publié le : <?= htmlspecialchars($article->getCreatedAt());?></li>
                </ul>

            </article>

            <br>
            <?php
        }
        ?>

        </div>


</section>