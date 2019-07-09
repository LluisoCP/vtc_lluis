<?php ob_start(); ?>

<h1 class="text-center py-3">Modifier l'association' #<?= $association->getId() ?></h1>

<form method="post" action="<?= url_association_edit($association->getId()) ?>">

    <div class="form-group">
        <label for="id_conducteur">Conducteur</label>
        <select name="id_conducteur" class="custom-select" id="id_conducteur">
            <?php foreach ($conducteurs as $conducteur) : ?>
                <option value="<?= $conducteur->getId() ?>" <?= $conducteur->getId() == $association->getConducteurId() ? " selected" : "" ?>>
                    <?= $conducteur->getPrenom() ?>, <?= $conducteur->getNom() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="id_vehicule">Vehicule</label>
        <select class="custom-select" name="id_vehicule" type="text" id="id_vehicule">
            <?php foreach ($vehicules as $vehicule) : ?>
                <option value="<?= $vehicule->getId() ?>" <?= $vehicule->getId() == $association->getVehiculeId() ? " selected" : "" ?>>
                    <?= $vehicule->getMarque() ?>, <?= $vehicule->getModele() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="submit" class="btn btn-success" value="Enregistrer">

</form>
<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>