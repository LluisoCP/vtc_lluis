<?php ob_start(); ?>

<h1 class="text-center py-3">Conducteur #<?= $conducteur->getId() ?></h1>

<div class="card mb-3">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Prénom: <?= $conducteur->getPrenom() ?> </li>
            <li class="list-group-item">Nom: <?= $conducteur->getNom() ?> </li>
        </ul>
    </div>
</div>


<?php $content = ob_get_clean() ?>

<?php view('template', compact('content')); ?>