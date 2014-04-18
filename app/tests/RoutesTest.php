<?php

/**
 * @group functional
 * @group routes
 */
class RoutesTest extends TestCase 
{
    public function testControllerMethodsExistForAllRoutes()
    {
        $missing = '';
        $routes = App::make('router')->getRoutes();

        foreach ($routes as $key=>$route) {
            $action = $this->getTestableActionName($route);
            $missing .= $this->determineIfRouteIsMissing($action);
        }

        $this->assertEquals('', $missing);
    }


    private function getTestableActionName($route)
    {
        $action = $route->getAction();

        if ( !$action || !isset($action['controller']))
            return;

        $controller = $action['controller'];

        return (strpos($controller,'@')!==False) ? $controller : Null;
    }

    private function determineIfRouteIsMissing($action)
    {
        if (! $action) return;

        list($class, $method) = explode('@', $action);
        if (! method_exists($class, $method)) {
            return "Method $class::$method does not exist" . PHP_EOL;
        }
    }

}

