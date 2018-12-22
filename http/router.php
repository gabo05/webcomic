<?php
    namespace http;
    /**
     * Class that routes the requests
     */
    class Router{
        private $customRoutes = array(
            array(
                'pattern' => '/\/comic\/[0-9]+/',
                'controller' => 'Home',
                'action' => 'comic'
            )
        );
        public function isNullOrEmpty(string $str){
            return $str == '' || $str == null;
        }
        /**
         * Handles the request
         */
        public function handleRequest() {
            $path = preg_replace('/^\/[a-z0-9-_$()]+/', '', $_SERVER['REQUEST_URI'], 1);

            $parameters = explode("/", $path);
            
            $controller = ucfirst(strtolower($this->isNullOrEmpty($parameters[1] ?? '') ? 'home' : $parameters[1]));
            $action = strtolower($this->isNullOrEmpty($parameters[2] ?? '') ? 'index' : $parameters[2] );
            $id = $this->isNullOrEmpty($parameters[3] ?? '') ? '' : $parameters[3];
    
            foreach ($this->customRoutes as $key => $route) {
                if(preg_match($route['pattern'], $path)){
                    $controller = $route['controller'];
                    $action = $route['action'];
                    break;
                }
            }
            
            $controllerClass = '\\controllers\\'.$controller.'Controller';
    
            $controllerInstance = new $controllerClass();
    
            $parameters = explode("/", $_SERVER['REQUEST_URI']);
    
            return $controllerInstance->$action($parameters);
        }
    }
    
?>