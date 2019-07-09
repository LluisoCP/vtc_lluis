<?php ob_start(); ?>
<!-- Modal -->
<div id="modal">
    <div>
        <h4 class="text-center">Supprimer un vehicule</h4>
        <p class="text-center">Êtes-vous sûr de supprimer cet vehicule?</p>
        <div id="buttons">
            <a id="cancel" href="#" class="btn btn-sm btn-secondary mb-2">Annuler</a>
            <a id="delete" href="#" class="btn btn-sm btn-danger mb-2">Supprimer</a>
        </div>
    </div>
</div>
<?php $modal = ob_get_clean() ?>

<?php ob_start(); ?>

<h1 class="text-center py-3">Tous les Vehicules.</h1>
<table class="table">
    <thead>
        <tr class="text-center">
            <th>Marque</th>
            <th>Modele</th>
            <th>Couleur</th>
            <th>Immatriculation</th>
            <th>Détails</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicules as $vehicule) : ?>
            <tr class="text-center">

                <td class="align-middle"><?= $vehicule->getMarque() ?></td>
                <td class="align-middle"><?= $vehicule->getModele() ?></td>
                <td class="align-middle"><?= $vehicule->getCouleur() ?></td>
                <td class="align-middle"><?= $vehicule->getImmatriculation() ?></td>
                <td class="align-middle">
                    <a href="<?= url_vehicule($vehicule->getId()) ?>"><i class="details icon fas fa-hand-point-right"></i></a>
                </td>
                <td class="align-middle">
                    <a href="<?= url_vehicule_edit($vehicule->getId()) ?>"><i class="edit icon fas fa-pen-square"></i></a>
                </td>
                <td class="align-middle">
                    <i class="triggers delete icon fas fa-trash-alt" data-target="<?= url_vehicule_delete($vehicule->getId()) ?>"></i>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content', 'modal')); ?>