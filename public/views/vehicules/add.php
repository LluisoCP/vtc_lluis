<?php ob_start(); ?>

<h1 class="text-center py-3">Ajouter un vehicule</h1>

<form method="post" enctype="multipart/form-data" action="<?= url('vehicules/add') ?>">

    <div class="form-group">
        <label for="marque">Marque</label>
        <input class="form-control" name="marque" type="text" id="marque">
    </div>

    <div class="form-group">
        <label for="modele">Modéle</label>
        <input class="form-control" name="modele" type="text" id="modele">
    </div>

    <div class="form-group">
        <label for="couleur">Couleur</label>
        <input class="form-control" name="couleur" type="text" id="couleur">
    </div>

    <div class="form-group">
        <label for="immatriculation">Immatriculation</label>
        <input class="form-control" name="immatriculation" type="text" id="immatriculation">
    </div>

    <input class="btn btn-primary" type="submit" value="Ajouter">
</form>

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>