

<section class="backcolorPage zoneWriting">
    <a href="../public/index.php" title="retour à l'accueil"><i class="fas fa-arrow-circle-left fa-2x"></i></a><br><br>

    <?= $this->session->show('verifyPseudo'); ?>

    <form method="post" action="../public/index.php?route=inscriptionUser">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pseudo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="pseudo" name="pseudo">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">

            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="S'inscrire">
            </div>
        </div>
    </form>


</section>


