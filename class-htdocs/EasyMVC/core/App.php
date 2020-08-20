<?php

class App {
    
    public function __construct() {
        $url = $this->parseUrl();
        
        //轉換ＵＲＬ為陣列字串，呼叫Controller程式

        // $controllerName = "{$url[0]}Controller";
        // require_once "controllers/$controllerName.php"; 
                        //why not ../controller ? 參考路徑以index為準
                        //inedx <- app.php <- Namecontroller.php (require)
        // $controller = new $controllerName;
        // $methodName = $url[1];
        // unset($url[0]); unset($url[1]); //first one become [2]
        // $params = $url ? array_values($url) : Array();
        // call_user_func_array(Array($controller, $methodName), $params);

        $controllerName = "{$url[0]}Controller";
        if (!file_exists("controllers/$controllerName.php"))
            return;
        require_once "controllers/$controllerName.php";
        $controller = new $controllerName;
        $methodName = isset($url[1]) ? $url[1] : "index";
        if (!method_exists($controller, $methodName))
            return;
        unset($url[0]); unset($url[1]);
        $params = $url ? array_values($url) : Array();
        call_user_func_array(Array($controller, $methodName), $params);
    }
    
    public function parseUrl() {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = explode("/", $url);
            return $url;
        }
    }

    
}

?>