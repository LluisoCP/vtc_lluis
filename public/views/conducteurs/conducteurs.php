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

<h1 class="text-center py-3">Tous les Conducteurs.</h1>
<table class="table">
    <thead>
        <tr class="text-center">
            <th>Prénom</th>
            <th>Nom</th>
            <th>Détails</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conducteurs as $conducteur) : ?>
            <tr class="text-center">

                <td class="align-middle"><?= $conducteur->getPrenom() ?></td>
                <td class="align-middle"><?= $conducteur->getNom() ?></td>
                <td class="align-middle">
                    <a href="<?= url_conducteur($conducteur->getId()) ?>"><i class="details icon fas fa-hand-point-right"></i></a>
                </td>
                <td class="align-middle">
                    <a href="<?= url_conducteur_edit($conducteur->getId()) ?>"><i class="edit icon fas fa-pen-square"></i></a>
                </td>
                <td class="align-middle">
                    <i class="triggers delete icon fas fa-trash-alt" data-target="<?= url_conducteur_delete($conducteur->getId()) ?>"></i>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php $content = ob_get_clean() ?> <?php view('template', compact('content', 'modal')); ?>