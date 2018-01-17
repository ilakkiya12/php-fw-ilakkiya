<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Core\Routing;

use Metinet\Core\Logger\FileLogger;

interface FileLoader
{
    public function load(): RouteCollection;
    public function load();
}
