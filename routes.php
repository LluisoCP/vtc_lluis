<?php

// Create Router instance
$router = new Router();


$router->get('', 'PagesController@home' );

/* Vehicules */
// Modifier
$router->get('vehicule/{id}/edit', 'VehiculesController@edit');
$router->post('vehicule/{id}/edit', 'VehiculesController@update');

//Supprimer
$router->get('vehicule/{id}/delete', 'VehiculesController@delete');

// Afficher un
$router->get('vehicule/{id}', 'VehiculesController@show');

//Ajouter
$router->get('vehicules/add','VehiculesController@add');
$router->post('vehicules/add', 'VehiculesController@save');
//Tous afficher
$router->get('vehicules', 'VehiculesController@index');



/* Conducteurs */
// Modifier
$router->get('conducteur/{id}/edit', 'ConducteursController@edit');
$router->post('conducteur/{id}/edit', 'ConducteursController@update');

// Afficher un
$router->get('conducteur/{id}', 'ConducteursController@show');

//Supprimer
$router->get('conducteur/{id}/delete', 'ConducteursController@delete');

//Ajouter
$router->get('conducteurs/add', 'ConducteursController@add');
$router->post('conducteurs/add', 'ConducteursController@save');
//Tous afficher
$router->get('conducteurs', 'ConducteursController@index');

/* Associations */
// Modifier
$router->get('association/{id}/edit', 'AssociationsController@edit');
$router->post('association/{id}/edit', 'AssociationsController@update');

// Afficher un
$router->get('association/{id}', 'AssociationsController@show');

//Supprimer
$router->get('association/{id}/delete', 'AssociationsController@delete');

//Ajouter
// $router->get('associations/add', 'AssociationsController@add');
// $router->post('associations/add', 'AssociationsController@save');
//Tous afficher
$router->get('associations', 'AssociationsController@index');
$router->post('associations', 'AssociationsController@save');



// Run it!
$router->run();