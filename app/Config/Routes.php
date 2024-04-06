<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2021 CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
// $routes->get('/dashboard/home(:any)', 'indexDashboard::index/$1', ['as' => 'dashboard.fetch', 'filter' => 'authf:admin,user']);
$routes->get('/dashboard/home(:any)', 'Dashboard::fetch/$1', ['as' => 'dashboard.fetch', 'filter' => 'authf:admin,user']);
$routes->get('/auth/login', 'Auth::login', ['as' => 'auth.login']);
$routes->post('/auth/login', 'Auth::login', ['as' => 'auth.login']);
$routes->get('/register', 'Auth::register', ['as' => 'auth.register']);
$routes->post('/register', 'Auth::register', ['as' => 'auth.register']);
$routes->get('/dashboard', 'Dashboard::index', ['as' => 'dashboard', 'filter' => 'authf:admin,user']);
$routes->post('/dashboard/index', 'Dashboard::upload', ['as' => 'dashboard.upload', 'filter' => 'authf:admin,user']);
$routes->get('/dashboard/index', 'Dashboard::upload', ['as' => 'dashboard.index', 'filter' => 'authf:admin,user']);
$routes->post('/dashboard', 'Dashboard::index', ['as' => 'dashboard', 'filter' => 'authf:admin,user']);
$routes->get('/logout', 'Auth::logout', ['as' => 'logout']);
$routes->get('/post', 'Post::index', ['as' => 'post', 'filter' => 'authf:admin,user']);
$routes->get('/addpost', 'Post::store', ['as' => 'post.store', 'filter' => 'authf:admin,user']);
// $routes->get('/addpost', 'Post::create', ['as' => 'post.create', 'filter' => 'authf:admin,user']);
$routes->post('/addpost', 'Post::create', ['as' => 'post.create', 'filter' => 'authf:admin,user']);
$routes->get('/post/(:any)', 'Post::index/$1', ['as' => 'post.slug']);
$routes->get('/postview', 'Post::view', ['as' => 'post.view']);
$routes->post('/updatepost/(:any)', 'Post::update/$1', ['as' => 'post.up', 'filter' => 'authf:admin,user']);
$routes->get('/editpost/(:any)', 'Post::edit/$1', ['as' => 'post.editGet', 'filter' => 'authf:admin,user']);
$routes->get('/deletepost/(:any)', 'Post::destroy/$1', ['as' => 'post.destroy', 'filter' => 'authf:admin,user']);
// $routes->get('uploads/(:segment)', 'IndexDashboard::serveImage/$1', ['as' => 'upload.serveImage']);
$routes->get('uploads/(:segment)', 'Dashboard::serveImage/$1', ['as' => 'upload.serveImage']);


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
