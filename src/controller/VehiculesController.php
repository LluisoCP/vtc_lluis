<?php


class VehiculesController {

    public function add()
    {
        view('vehicules.add');
    }

    public function save()
    {
        $vehicule = new Vehicule;
        
        $vehicule->setMarque($_POST['marque']);
        $vehicule->setModele($_POST['modele']);
        $vehicule->setCouleur($_POST['couleur']);
        $vehicule->setImmatriculation($_POST['immatriculation']);

        $vehicule->save();

        // redirectTo('vehicules');
    }

    public function index()
    {
        $vehicules = Vehicule::findAll();
        view('vehicules.vehicules', compact('vehicules'));
    }

    public function show($id)
    {
        $vehicule = Vehicule::findOne($id);

        view('vehicules.vehicule', compact('vehicule'));
    }

    public function edit($id)
    {
        $vehicule = Vehicule::findOne($id);

        view('vehicules.edit', compact('vehicule'));
    }

    public function update($id)
    {
    
        $vehicule = Vehicule::findOne($id);

        $vehicule->setMarque($_POST['marque']);
        $vehicule->setModele($_POST['modele']);
        $vehicule->setCouleur($_POST['couleur']);
        $vehicule->setImmatriculation($_POST['immatriculation']);

        $vehicule->update();

        redirectTo('vehicules');
    
    }

    public function delete($id)
    {
        $vehicule = Vehicule::findOne($id);
        $vehicule->delete();

        redirectTo('vehicules');
    }


}