<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 16/01/2018
 * Time: 14:24
 */

namespace Metinet\Core\Routing;


class ChainLoader implements FileLoader
{
    /** @var FileLoader[] */
    private $loaders;
    public function __construct(array $loaders)
    {
        $this->loaders = $loaders;
    }
    public function load(): RouteCollection
    {
        $routes = new RouteCollection();
        foreach ($this->loaders as $loader) {
            $routes->merge($loader->load());
        }
        return $routes;
    }
}