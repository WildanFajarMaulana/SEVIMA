<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//AUTH 
$routes->get('/', 'Auth::index');
$routes->get('/register', 'Auth::register');

$routes->post('/auth/register', 'Auth::prosesRegister');
$routes->post('/auth/login', 'Auth::prosesLogin');
$routes->post('/auth/logout', 'Auth::logout');


// DEFAULT PAGE
$routes->get('/home/', 'DefaultPage::index');
$routes->get('/home/profile', 'DefaultPage::profile');
$routes->get('/home/getDetailProfile', 'DefaultPage::getDetailProfile');
$routes->get('/home/learning', 'DefaultPage::learning');
$routes->get('/home/dataroom/(:any)', 'DefaultPage::dataroom/$1');
$routes->get('/home/datatask/(:any)/(:any)', 'DefaultPage::datatask/$1/$2');
$routes->get('/home/getKomentar', 'DefaultPage::getKomentar');
$routes->get('/home/getDetailSubmit', 'DefaultPage::getDetailSubmit');
$routes->get('/home/getDetailKirim', 'DefaultPage::getDetailKirim');

$routes->post('/home/editProfile', 'DefaultPage::editProfile');
$routes->post('/home/addProfile', 'DefaultPage::tambahProfile');
$routes->post('/home/addRoomLearning', 'DefaultPage::tambahRoomLearning');
$routes->post('/home/addTask', 'DefaultPage::tambahTask');
$routes->post("/home/deleteTask", 'DefaultPage::deleteTask');
$routes->post("/home/addKomentar", 'DefaultPage::tambahKomentar');
$routes->post("/home/joinRoom", 'DefaultPage::joinRoom');
$routes->post("/home/konfirmasiJoinRoom", 'DefaultPage::konfirmasiJoinRoom');
$routes->post("/home/submitTask", 'DefaultPage::submitTask');
$routes->post("/home/kirimTask", 'DefaultPage::kirimTask');
$routes->post("/home/cancelTask", 'DefaultPage::cancelTask');
$routes->post("/home/acceptTask", 'DefaultPage::acceptTask');
$routes->post("/home/hapusDetailTask", 'DefaultPage::hapusDetailTask');

$routes->get('/admin/', 'Admin::index');
$routes->get('/admin/account', 'Admin::account');
$routes->get('/admin/roomguru', 'Admin::roomguru');
$routes->get('/admin/roomsiswa', 'Admin::roomsiswa');
$routes->get('/admin/roomcomment', 'Admin::roomcomment');
$routes->get('/admin/dataroomguru', 'Admin::dataroomguru');
$routes->get('/admin/dataroomsiswa', 'Admin::dataroomsiswa');
$routes->get('/admin/logout', 'Admin::logout');








/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}