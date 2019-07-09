<?php


class AssociationsController
{

    public function add()
    {
        view('associations.add');
    }

    public function save()
    {
        $association = new Association;

        $association->setConducteurId($_POST[ 'id_conducteur']);
        $association->setVehiculeId($_POST['id_vehicule']);

        $association->save();

        // redirectTo('associations');
    }

    public function index()
    {
        $associations = Association::findAll();
        $vehicules = Vehicule::findAll();
        $conducteurs = Conducteur::findAll();
        view('associations.associations', compact('associations', 'vehicules', 'conducteurs'));

        // redirectTo('associations');

    }
    public function show($id)
    {
        $association = Association::findOne($id);

        view('associations.association', compact('association'));
    }

    public function edit($id)
    {
        $association = Association::findOne($id);
        $conducteurs = Conducteur::findAll();
        $vehicules = Vehicules::findAll();
        view('associations.edit', compact('association', 'vehicules', 'conducteurs'));
    }

    public function update($id)
    {

        $association = Association::findOne($id);

        $association->setConducteurId($_POST['id_conducteur']);
        $association->setVehiculeId($_POST['id_vehicule']);
        

        $association->update();

        // redirectTo('associations');

    }

    public function delete($id)
    {
        $association = Association::findOne($id);
        $association->delete();

        // redirectTo('associations');
    }
}
