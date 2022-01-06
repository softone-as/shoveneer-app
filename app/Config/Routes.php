<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'C_Toko::home');

$routes->get('/login', 'C_Login::index');
$routes->get('/logout', 'C_Login::logout');
$routes->get('/register', 'C_Login::register');

$routes->group('file', function ($routes) {
    $routes->add('/', 'C_FileIO::index');
});

$routes->group('toko', function ($routes) {
    // $routes->add('/', 'C_Toko::index', ['filter' => 'auth']);
    $routes->add('/', 'C_Toko::index');
    $routes->add('cart', 'C_Cart::index');
    $routes->add('add-cart/(:segment)', 'C_Cart::addToShoppingCart/$1');
    $routes->add('remove-cart/(:segment)', 'C_Cart::remove/$1');
    $routes->add('clear-all', 'C_Cart::clearCart');
    $routes->add('checkout', 'C_Payment::toCheckout');
    $routes->add('payment', 'C_Payment::toPayment');
    $routes->add('success', 'C_Payment::confirm');
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
