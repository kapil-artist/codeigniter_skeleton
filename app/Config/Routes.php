<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/**
 * --------------------------------------------------------------------
 * ALL ADMIN ROUTES
 * --------------------------------------------------------------------
 */
$routes->add('/admin', 'Admin/Admin::index');
$routes->add('/admin/login', 'Admin/Admin::login');
$routes->add('/admin/logout', 'Admin/Admin::logout');
//--
$routes->add('/admin/userlist', 'Admin/User::list');
$routes->add('/admin/useradd', 'Admin/User::add');
$routes->add('/admin/userdelete', 'Admin/User::delete');
//--
$routes->add('/admin/productlist', 'Admin/Product::list');
$routes->add('/admin/productadd', 'Admin/Product::add');
$routes->add('/admin/productdelete', 'Admin/Product::delete');
//--
$routes->add('/login', 'Login::login');
$routes->add('/logout', 'Login::logout');
$routes->add('/signup', 'Signup::index');
/**
 * --------------------------------------------------------------------
 * ALL ADMIN ROUTES END
 * --------------------------------------------------------------------
 */


$routes->add('/login', 'Login::login');
$routes->add('/logout', 'Login::logout');
$routes->add('/signup', 'Signup::index');
$routes->get('/', 'Home::index');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
