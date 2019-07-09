<?php ob_start(); ?>
<!-- Modal -->
<div id="modal">
    <div>
        <h4 class="text-center">Supprimer un conducteur</h4>
        <p class="text-center">Êtes-vous sûr de supprimer cet conducteur?</p>
        <div id="buttons">
            <a id="cancel" href="#" class="btn btn-sm btn-secondary mb-2">Annuler</a>
            <a id="delete" href="#" class="btn btn-sm btn-danger mb-2">Supprimer</a>
        </div>
    </div>
</div>
<?php $modal = ob_get_clean() ?>

<?php ob_start(); ?>

<h1 class="text-center py-3">Toutes les Associations.</h1>
<table class="table">
    <thead>
        <tr class="text-center">
            <th>Idéntifiant</th>
            <th>Conducteur</th>
            <th>Vehicule</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($associations as $association) : ?>
            <tr class="text-center">
                <td class="align-middle"><?= $association->getId() ?></td>
                <td class="align-middle"><?= $association->getConducteur()->getPrenom() ?>, <?= $association->getConducteur()->getNom() ?></td>
                <td class="align-middle"><?= $association->getVehicule()->getMarque() ?> <?= $association->getVehicule()->getModele() ?></td>
                <td class="align-middle">
                    <a href="<?= url_association_edit($association->getId()) ?>"><i class="edit icon fas fa-pen-square"></i></a>
                </td>
                <td class="align-middle">
                    <i class="triggers delete icon fas fa-trash-alt" data-target="<?= url_association_delete($association->getId()) ?>"></i>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<div class="col-4 offset-4 py-3">
    <h4 class="text-center">Ajouter une Association</h4>
    <form action="<?= url('associations') ?>" method="POST">
        <div class="form-group">
            <label for="conducteur">Conducteur</label>
            <select name="id_conducteur" class="custom-select" id="conducteur">
                <?php foreach ($conducteurs as $conducteur) : ?>
                    <option value="<?= $conducteur->getId() ?>"><?= $conducteur->getNom() ?>, <?= $conducteur->getPrenom() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="vehicule">Vehicule</label>
            <select name="id_vehicule" class="custom-select" id="vehicule">
                <?php foreach ($vehicules as $vehicule) : ?>
                    <option value="<?= $vehicule->getId() ?>"><?= $vehicule->getMarque() ?> <?= $vehicule->getModele() ?></option>
                <?php endforeach; ?>
            </select>
        </div>


        <input class="btn btn-primary" type="submit" value="Ajouter">

    </form>



    <?php $content = ob_get_clean() ?> <?php view('template', compact('content', 'modal')); ?>