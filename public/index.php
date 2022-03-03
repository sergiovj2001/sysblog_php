<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
require_once "..\Vendor\autoload.php";
use Dotenv\Dotenv;
use Aura\Router\RouterContainer;
use Laminas\Diactoros;
use Laminas\Diactoros\Response\RedirectResponse;
use Illuminate\Database\Capsule\Manager as Capsule;

session_start();
$dotenv = Dotenv::createImmutable(__DIR__ . '\..');
$dotenv->load();
$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('about', '/about', [
    'controller'=>'App\Controllers\PagesController',
    'action'=>'aboutAction'
]);
$map->get('contact', '/contact', [
    'controller'=>'App\Controllers\PagesController',
    'action'=>'contactAction'
]);
$map->post('contactSend', '/contact', [
    'controller'=>'App\Controllers\PagesController',
    'action'=>'contactActionSend'
]);
$map->get('index', '/blog', [
    'controller'=>'App\Controllers\IndexController',
    'action'=>'indexAction'
]);
$map->get('showBlog', '/blog/{id}', [
    'controller'=>'App\Controllers\PagesController',
    'action'=>'showBlogPostAction'
]);
$map->get('paginaPrincipal', '/', [
    'controller'=>'App\Controllers\IndexController',
    'action'=>'indexAction'
]);





$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if (!$route) {
    echo 'No route';
} else {
    //Aprovachmos la posibilidad que nos da php de crear clases con el nombre almacenado en una variable
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $needsAuth = $handlerData['auth'] ?? false;
    $sessionUserId = $_SESSION['userId'] ?? null;
    if ($needsAuth && !$sessionUserId) {
        header('Location: /login');

    }
    else {
        $controller = new $controllerName;
        $response = $controller->$actionName($request);
        foreach($response->getHeaders() as $name => $values) {
            foreach($values as $value) {
              header(sprintf('%s: %s', $name, $value), false);
              }
         }
         http_response_code($response->getStatusCode());
         echo $response->getBody();
    }
}
?>