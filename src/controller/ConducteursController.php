<?php


class ConducteursController
{

    public function add()
    {
        view('conducteurs.add');
    }

    public function save()
    {
        $conducteur = new Conducteur;

        $conducteur->setPrenom($_POST['prenom']);
        $conducteur->setNom($_POST['nom']);

        $conducteur->save();

        // redirectTo('conducteurs');
    }

    public function index()
    {
        $conducteurs = Conducteur::findAll();
        view('conducteurs.conducteurs', compact('conducteurs'));
    }
    public function show($id)
    {
        $conducteur = Conducteur::findOne($id);

        view('conducteurs.conducteur', compact('conducteur'));
    }
    public function edit($id)
    {
        $conducteur = Conducteur::findOne($id);

        view('conducteurs.edit', compact('conducteur'));
    }

    public function update($id)
    {

        $conducteur = Conducteur::findOne($id);

        $conducteur->setPrenom($_POST['prenom']);
        $conducteur->setNom($_POST['nom']);

        $conducteur->update();

        redirectTo('conducteurs');

    }


    public function delete($id)
    {
        $conducteur = Conducteur::findOne($id);
        $conducteur->delete();

        // redirectTo('conducteurs');
    }

    
}
