<?php
    namespace base;
    /**
     * Base class for Controllers
     */
    abstract class Controller
    {
        /**
         * Serialize an object to JSON and return it as response
         * @param object $response The object to be serialized and returned
         */
        protected function json($response){
            if (headers_sent() === false){
                header('Content-type: application/json');
                echo json_encode($response);
            }
        }
        /**
         * Gets the controller's name
         */
        protected function getName() {
            $controllerName = str_replace('controllers\\', '', str_replace('Controller', '', get_class($this)));

            return $controllerName;
        }
        /**
         * Renders a view
         * @param string $viewName View's name
         * @param object $viewModel View's model
         */
        protected function view(string $viewName, object $viewModel = null) {
            $view = new View($viewName, $this->getName(), $viewModel);

            return $view->render();
        }
        /**
         * Redirect
         * @param string $url Url to redirect to
         * @param bool $permanent whether the redirect is permanent or not
         */
        protected function redirect(string $url, bool $permanent = false) {
            if (headers_sent() === false){
                header("Location: $url", true, ($permanent === true) ? 301 : 302);
            }
        }
    }
    
?>