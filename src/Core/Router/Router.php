<?php
namespace App\Core\Router;

class Router {
    private string $defaultController = 'HomeController';
    private string $defaultMethod = 'show';

    public function start() : void {
        [$controllerName, $methodName, $params] = $this->parseUri($_SERVER['REQUEST_URI']);

        $controllerClass = "\\App\\Controller\\" . $controllerName;
        if (!class_exists($controllerClass)) {
            echo "Erreur: Controller n'existe pas.";
            return;
        }

        $controller = new $controllerClass();
        if (!method_exists($controller, $methodName)) {
            echo "Erreur: Méthode n'existe pas dans le controller.";
            return;
        }

        call_user_func_array([$controller, $methodName], $params);
    }

    private function parseUri($uri): array {
        $parts = explode('/', $uri);
        array_shift($parts);

        $controllerName = !empty($parts[0]) ? ucfirst($parts[0]).'Controller' : $this->defaultController;
        $methodName = !empty($parts[1]) ? $parts[1] : $this->defaultMethod;
        $params = array_slice($parts, 2);

        return [$controllerName, $methodName, $params];
    }


}