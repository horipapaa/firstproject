<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'CalculatorController::index');
$routes->post('calculate', 'CalculatorController::calculate');
$routes->get('records', 'DatasController::index');