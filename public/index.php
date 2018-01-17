<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . '/../vendor/autoload.php';
use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;
use Metinet\Core\Routing\RouteUrlMatcher;
use Metinet\Core\Routing\RouteNotFound;
use Metinet\Core\Routing\JsonFileLoader;
use Metinet\Core\Routing\CsvFileLoader;
use Metinet\Core\Routing\PhpFileLoader;
use Metinet\Core\Routing\ChainLoader;
use Metinet\Core\Controller\ControllerResolver;
use Metinet\Core\Logger\FileLogger;
use Metinet\Core\Logger\SimpleFormatter;
use Metinet\Core\Config\Configuration;


$request = Request::createFromGlobals();

$loader = new ChainLoader([
    new JsonFileLoader([__DIR__ . '/../conf/app.json']),
]);

$config = new Configuration($loader);

$logger = new FileLogger(
    str_replace('__DIR__', __DIR__, $config->getSection('logger')['path']),
    new SimpleFormatter($config->getSection('logger')['format'])
);



try {
    $controllerResolver = new ControllerResolver(new RouteUrlMatcher($loader->load()));
    $callableAction = $controllerResolver->resolve($request);
    $response = call_user_func($callableAction, $request);
} catch (RouteNotFound $e) {
    $logger->log($e->getMessage(), ['url' => $request->getPath()]);
    $response = new Response('Page not found', 404);
} catch (Throwable $e) {
    $logger->log($e->getMessage(), ['url' => $request->getPath()]);
    $response = (function($message) {
        return new Response(sprintf('<p>Error: %s</p>', $message), 500);
    })($e->getMessage());
}
$response->send();