<?php ob_start(); ?>

<h1 class="text-center py-3">Modifier le conducteur #<?= $conducteur->getId() ?></h1>

<form method="post" action="<?= url_conducteur_edit($conducteur->getId()) ?>">

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input value="<?= $conducteur->getPrenom() ?>" name="prenom" id="prenom" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label for="nom">Nom</label>
        <input value="<?= $conducteur->getNom() ?>" name="nom" id="nom" type="text" class="form-control">
    </div>

    <input type="submit" class="btn btn-success" value="Enregistrer">

</form>
<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>