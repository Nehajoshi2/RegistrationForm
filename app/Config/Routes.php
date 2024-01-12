<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('registration', 'Registration::index');
$routes->post('registration/process', 'Registration::process');
$routes->get('registration/success', 'Registration::success');
$routes->get('registration/edit/(:num)', 'Registration::edit/$1');
$routes->post('registration/update/(:num)', 'Registration::update/$1');

$routes->get('registration/delete/(:num)', 'Registration::delete/$1');