<a href="../public/index.php">Retour à l'accueil</a>



<form method="post" action="../public/index.php?route=connexionUser">
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
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                    J’ai bien lu et je suis d’accord avec les termes et conditions d’utilisation.
                    Je sais que mes informations ne serviront à rien de lucratif et qu'elles participent à un projet dans le
                    programme Développeur Web Junior d'OpenClassrooms.
                </label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Se connecter">
        </div>
    </div>
</form>



