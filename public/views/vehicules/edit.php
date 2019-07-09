<?php ob_start(); ?>

<h1 class="text-center py-3">Modifier le vehicule #<?= $vehicule->getId() ?></h1>

<form method="post" action="<?= url_vehicule_edit($vehicule->getId()) ?>">

    <div class="form-group">
        <label for="marque">Marque</label>
        <input value="<?= $vehicule->getMarque() ?>" name="marque" id="marque" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label for="modele">Modèle</label>
        <input value="<?= $vehicule->getModele() ?>" name="modele" id="modele" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label for="couleur">Couleur</label>
        <input value="<?= $vehicule->getCouleur() ?>" name="couleur" id="couleur" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label for="immatriculation">Immatriculation</label>
        <input value="<?= $vehicule->getImmatriculation() ?>" name="immatriculation" id="immatriculation" type="text" class="form-control">
    </div>

    <input type="submit" class="btn btn-success" value="Enregistrer">

</form>
<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>