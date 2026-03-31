<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */ 
$routes->get('/', 'Main::index');
$routes->post('komponenty/ulozit', 'Main::ulozit');
$routes->get("komponenty/(:any)", "Main::komponenty/$1");
$routes->get("typkomponentu/(:num)", "Main::typkomponentu/$1");
$routes->get('/', 'Vyrobce::index');
$routes->post('vyrobce/ulozit', 'Vyrobce::ulozit');
$routes->get('editace/index/(:num)', 'Editace::index/$1');
$routes->put('editace/aktualizovat/(:num)', 'Editace::aktualizovat/$1');
$routes->delete('typkomponentu/delete', 'Mazani::smazat');
