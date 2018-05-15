<?php

class Route
{
    static $routes;

    public static function get($pattern, $params)
    {
        self::$routes[$pattern] = $params;
    }

    public static function run()
    {
        $url = $_GET['url'];
            if($url==""){
            self::runDefaultController();
            return;}
        $matched = null;
        $params = [];
        foreach (self::$routes as $pattern => $handler) {
            if (match($url, $pattern, $params)) {
                $matched = $handler;
            }
        }

        if ($matched) {
            $matched = explode("@", $matched);
            $pathToController = 'app/controllers/' . $matched[0] . ".php";
            require_once $pathToController;
            $controller = new $matched[0];
            $middleware = $controller->getMiddleware();
            foreach ($middleware as $m) {
                require "app/middleware/$m.php";
                $M =new $m;
                if (! $M->handle()){
                    self::redirectHome();
                    return;
                }
            }
            $controller = new $matched[0];
            $controller->{$matched[1]}($params);
        } else {
            self::redirectHome();
        }
    }

    private static function runDefaultController(){
        require "app/controllers/Main.php";
        $controller = new Main;
        $controller->index();
    }
    private static function redirectHome(){
        header( 'Location: /' );
    }
}


function match($str, $pattern, &$params)
{
    $a1 = explode('/', $str);
    $a2 = explode('/', $pattern);

    if (count($a1) != count($a2))
        return false;
    for ($i = 0; $i < count($a1); $i++) {
        if ($a2[$i][0] != "{") {
            if (strcasecmp($a1[$i], $a2[$i]))
                return false;
        } else {
            if (empty($a1[$i])) {
                return false;
            }
            $params[substr($a2[$i], 1, -1)] = $a1[$i];
        }
    }
    return true;
}

