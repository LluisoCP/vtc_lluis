<?php ob_start(); ?>

<h1 class="text-center py-3">Ajouter un conducteur</h1>

<form method="post" enctype="multipart/form-data" action="<?= url('conducteurs/add') ?>">

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input class="form-control" name="prenom" type="text" id="prenom">
    </div>

    <div class="form-group">
        <label for="nom">Nom</label>
        <input class="form-control" name="nom" type="text" id="nom">
    </div>


    <input class="btn btn-primary" type="submit" value="Ajouter">

</form>

<?php $content = ob_get_clean() ?> <?php view('template', compact('content')); ?>