<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Core\Routing;

use Metinet\Core\Logger\FileLogger;

class JsonFileLoader implements FileLoader
{
    private $paths;

    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    public function load(): RouteCollection
    {
        $routes = new RouteCollection();

        foreach ($this->paths as $path) {
            $content = file_get_contents($path);
            $rawRoutes = json_decode($content, true);

            foreach ($rawRoutes['routes'] as $routeName => $rawRoute) {
                $routes->add(new Route(
                    $rawRoute['methods'],
                    $rawRoute['path'],
                    $rawRoute['action']
                ));
            }
        }

        return $routes;
    }

   /* public function load(): FileLogger
    {
        $logger=new FileLogger();

        foreach($this->paths as $path) {
            $content = file_get_contents($path);
            $rawlogger = json_decode($content, true );


        }
    }*/
}
