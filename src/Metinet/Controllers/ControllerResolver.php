<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */
namespace Metinet\Core\Controller;
use Metinet\Core\Http\Request;
use Metinet\Core\Routing\UrlMatcher;


class ControllerResolver
{
    private $urlMatcher;
    public function __construct(UrlMatcher $matcher)
    {
        $this->urlMatcher = $matcher;
    }
    public function resolve(Request $request): callable
    {
        $action = $this->urlMatcher->match($request);
        [$controller, $method] = explode('::', $action);
        $controller = strtr($controller, ':', '\\');
        $controllerInstance = new $controller();
        return [$controllerInstance, $method];
    }
}