<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// // Admin Login
$routes->get('/auth/login', 'UserController::getlogin');
$routes->post('/auth/login', 'UserController::postlogin');
$routes->get('/auth/logout', 'UserController::logout');
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

// pekerjaan
$routes->get('/admin/pekerjaan', 'PekerjaanController::index', ['filter' => 'UserFilter']);
$routes->post('/pekerjaan/save', 'PekerjaanController::save', ['filter' => 'UserFilter']);
$routes->post('/pekerjaan/update/(:segment)', 'PekerjaanController::update/$1',  ['filter' => 'UserFilter']);
$routes->delete('/pekerjaan/delete/(:num)', 'PekerjaanController::delete/$1',  ['filter' => 'UserFilter']);

// Pendidikan
$routes->get('/admin/pendidikan', 'pendidikanController::index', ['filter' => 'UserFilter']);
$routes->post('/pendidikan/save', 'pendidikanController::save', ['filter' => 'UserFilter']);
$routes->post('/pendidikan/update/(:segment)', 'pendidikanController::update/$1',  ['filter' => 'UserFilter']);
$routes->delete('/pendidikan/delete/(:num)', 'pendidikanController::delete/$1',  ['filter' => 'UserFilter']);

// Agama
$routes->get('/admin/agama', 'AgamaController::index', ['filter' => 'UserFilter']);
$routes->post('/agama/save', 'AgamaController::save', ['filter' => 'UserFilter']);
$routes->post('/agama/update/(:segment)', 'AgamaController::update/$1',  ['filter' => 'UserFilter']);
$routes->delete('/agama/delete/(:num)', 'AgamaController::delete/$1',  ['filter' => 'UserFilter']);

// Penghasilan
$routes->get('/admin/penghasilan', 'PenghasilanController::index', ['filter' => 'UserFilter']);
$routes->post('/penghasilan/save', 'PenghasilanController::save', ['filter' => 'UserFilter']);
$routes->post('/penghasilan/update/(:segment)', 'PenghasilanController::update/$1',  ['filter' => 'UserFilter']);
$routes->delete('/penghasilan/delete/(:num)', 'PenghasilanController::delete/$1',  ['filter' => 'UserFilter']);
