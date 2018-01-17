<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 16/01/2018
 * Time: 11:53
 */

namespace Metinet\Core\Routing;


class CsvFileLoader implements fileLoader
{
    private $paths;

    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    public function load(): RouteCollection
    {

        /* foreach ($this->paths as $path) {
             //$content = file_get_contents($path);
                 $handle=fopen($path);
                 while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                 {

                     foreach ($data as $onedata) {
                         $routename=$onedata[0];
                         $path=$onedata[1];
                         $methods=$onedata[2];
                         $action=$onedata[3];

                 }



             }*/

        $routes = new RouteCollection();
        foreach ($this->paths as $path) {
            $f = fopen($path, 'rb');
            while (false !== $data = fgetcsv($f)) {
                [, $path, $methods, $action] = $data;
                $methods = explode('|', $methods);
                $routes->add(new Route(
                    $methods,
                    $path,
                    $action
                ));
            }

            return $routes;
        }

    }
}