<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/test', 'Hello::index');

// Login
$routes->get('/login', 'Login::index');
$routes->post('/login/check_login', 'Login::check_login');
$routes->get('/login/logout', 'Login::logout');

$routes->get('/login/forgot_password', 'Login::forgotPassword');
$routes->post('/login/reset_password', 'Login::sentEmailPassword');
$routes->get('/user/reset/(:any)', 'Login::setNewPassword/$1');
$routes->post('/user/update_password', 'Login::updatePassword');

// Create an account 
$routes->get('/signup', 'Register::index');
$routes->post('/signup/save', 'Register::save');
$routes->get('/user/activate/(:any)', 'Register::activate_account/$1');


$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/events', 'Event::index');
$routes->get('/contact', 'Contact::index');

$routes->get('/career', 'Career::index');
$routes->get('/career/add_offer_form', 'Career::add_offer_form');
$routes->post('/career/add_offer_form/save', 'Offer::add_offer');

$routes->get('/settings', 'Settings::index');
$routes->post('/settings/update', 'Settings::update');



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
