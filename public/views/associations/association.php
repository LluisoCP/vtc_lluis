<?php ob_start(); ?>

<h1 class="text-center py-3">Association #<?= $association->getId() ?></h1>

<div class="card mb-3">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Conducteur: <?= $association->getConducteur()->getPrenom() ?>, <?= $association->getConducteur()->getNom() ?> </li>
            <li class="list-group-item">Vehicule: <?= $association->getVehicule()->getMarque() ?> <?= $association->getVehicule()->getModele() ?> </li>
        </ul>
    </div>
</div>


<?php $content = ob_get_clean() ?>

<?php view('template', compact('content')); ?>