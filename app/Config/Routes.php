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

// Job search 
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/fetch', 'Dashboard::fetch');
$routes->get('/dashboard/offer/(:any)', 'Dashboard::view_offer/$1');


// Offer view 
$routes->post('/offer/comment/(:any)', 'Offer::addComment/$1');
$routes->post('/offer/like/(:any)', 'Offer::likeOffer/$1');
$routes->post('/offer/remove_like/(:any)', 'Offer::removeLike/$1');
$routes->post('/offer/add_favourite/(:any)', 'Offer::addFavourite/$1');
$routes->post('/offer/remove_favourite/(:any)', 'Offer::removeFavourite/$1');

// Favourites 
$routes->get('/favourites', 'Favourite::index');

$routes->get('/career', 'Career::index');
$routes->get('/career/add_offer_form', 'Career::new_offer_form');
$routes->post('/career/add_offer_form/save', 'Offer::add_offer');

$routes->get('/offer/apply/(:any)', 'Career::application_form/$1');

$routes->post('/offer/apply/submit/(:any)', 'Offer::submit_application/$1');

$routes->get('/settings', 'Settings::index');
$routes->post('/settings/update_picture', 'Settings::update_picture');
$routes->post('/settings/update', 'Settings::update');
$routes->get('/settings/view_file/(:any)', 'Settings::preview/$1');
$routes->get('/settings/download/(:any)', 'Settings::download/$1');



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
