<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// // Admin Login
$routes->get('/auth/login','UserController::getlogin');
$routes->post('/auth/login','UserController::postlogin');
$routes->get('/auth/logout','UserController::logout');
// // User Login / register
// $routes->get('/login', 'Auth::login');
// $routes->post('/login', 'Auth::processLogin');
// $routes->get('/register', 'Auth::register');
// $routes->post('/register', 'Auth::processRegister');

// // User Lengkapi dokumen
// $routes->get('/dashboard', 'Siswa::index', ['filter' => 'auth']);
// $routes->get('/formulir', 'Siswa::formulir', ['filter' => 'auth']);
// $routes->post('/formulir', 'Siswa::submitFormulir');

// // Admin Dashboard
$routes->get('/admin', 'Admin::index', ['filter' => 'UserFilter']);