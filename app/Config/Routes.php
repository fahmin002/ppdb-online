<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// // Admin Login
$routes->get('/auth/login', 'LoginController::getlogin', ['filter' => 'LoginFilter']);
$routes->post('/auth/login', 'LoginController::postlogin');
$routes->get('/auth/logout', 'LoginController::logout', ['filter' => 'GuestFilter']);
// // User Login / register
$routes->get('/login', 'LoginController::userGetlogin', ['filter' => 'LoginFilter']);
$routes->post('/login', 'LoginController::userPostLogin');
$routes->get('/register', 'LoginController::userGetRegister', ['filter' => 'LoginFilter']);
$routes->post('/register', 'LoginController::userPostRegister');
$routes->get('/logout', 'LoginController::logout');

// // User Lengkapi dokumen
$routes->get('/dashboard', 'SiswaController::index');
$routes->get('/aboutme', 'SiswaController::formulir', ['filter' => 'UserFilter']);
$routes->post('/aboutme', 'SiswaController::submitFormulir', ['filter' => 'UserFilter']);

// // Admin Dashboard
$routes->get('/admin', 'Admin::index', ['filter' => 'UserFilter']);

// pekerjaan
$routes->get('/admin/pekerjaan', 'PekerjaanController::index', ['filter' => 'UserFilter']);
$routes->post('/pekerjaan/save', 'PekerjaanController::save', ['filter' => 'UserFilter']);
$routes->post('/pekerjaan/update/(:segment)', 'PekerjaanController::update/$1',  ['filter' => 'UserFilter']);
$routes->delete('/pekerjaan/delete/(:num)', 'PekerjaanController::delete/$1',  ['filter' => 'UserFilter']);

// Pendidikan
$routes->get('/admin/pendidikan', 'PendidikanController::index', ['filter' => 'UserFilter']);
$routes->post('/pendidikan/save', 'PendidikanController::save', ['filter' => 'UserFilter']);
$routes->post('/pendidikan/update/(:segment)', 'PendidikanController::update/$1',  ['filter' => 'UserFilter']);
$routes->delete('/pendidikan/delete/(:num)', 'PendidikanController::delete/$1',  ['filter' => 'UserFilter']);

// Agama
$routes->get('/admin/agama', 'AgamaController::index', ['filter' => 'UserFilter']);
$routes->post('/agama/save', 'AgamaController::save', ['filter' => 'UserFilter']);
$routes->post('/agama/update/(:segment)', 'AgamaController::update/$1',  ['filter' => 'UserFilter']);
$routes->delete('/agama/delete/(:num)', 'AgamaController::delete/$1',  ['filter' => 'UserFilter']);

// Penghasilan
$routes->get('/admin/penghasilan', 'PenghasilanController::index', ['filter' => 'UserFilter']);
$routes->post('/penghasilan/save', 'PenghasilanController::save', ['filter' => 'UserFilter']);
$routes->post('/penghasilan/update/(:segment)', 'PenghasilanController::update/$1', ['filter' => 'UserFilter']);
$routes->delete('/penghasilan/delete/(:num)', 'PenghasilanController::delete/$1',  ['filter' => 'UserFilter']);

// ADD User
$routes->get('/admin/adduser', 'UserController::index', ['filter' => 'UserFilter']);
$routes->get('/admin/detailuser/(:segment)', 'AddUserController::detail/$1', ['filter' => 'UserFilter']);

$routes->post('/admin/adduser/store', 'UserController::store', ['filter' => 'UserFilter']);
$routes->put('/User/update/(:num)', 'UserController::update/$1');
$routes->delete('/user/delete/(:num)', 'UserController::delete/$1',  ['filter' => 'UserFilter']);

// Lampiran
$routes->get('/admin/lampiran', 'LampiranController::index', ['filter' => 'UserFilter']);
$routes->post('/lampiran/upload', 'LampiranController::upload', ['filter' => 'UserFilter']);
$routes->put('/lampiran/update/(:num)', 'LampiranController::update/$1');
$routes->delete('/lampiran/delete/(:num)', 'LampiranController::delete/$1', ['filter' => 'UserFilter']);

// // User
$routes->get('/tentang', 'Home::tentang');
$routes->get('/prestasi', 'Home::prestasi');
$routes->get('/kegiatan', 'Home::kegiatan');
$routes->get('/galeri', 'Home::galeri');
$routes->get('/jadwal', 'Home::jadwal');
$routes->get('/kontak', 'Home::kontak');