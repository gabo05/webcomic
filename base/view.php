<?php
    namespace Base;
    /**
     * Base class for views
     */
    class View{
        /**
         * @var string Name of the view
         */
        protected $name;
        /**
         * @var object Model of the view
         */
        protected $model;
        /**
         * @var string Controller name
         */
        protected $controller;

        /**
         * Class constructor
         * @param string $name View's name
         * @param string $controller Controller's name
         * @param object $model Model
         */
        function __construct(string $name, string $controller, $model) {
            $this->name = $name;
            $this->controller = $controller;
            $this->model = $model;
        }
        /**
         * Render the view
         */
        public function render() {
            $path = "views/{$this->controller}/{$this->name}.php";

            if(!file_exists($path)){
                $path = "views/shared/{$this->name}.php";
            }
            require_once($path);
        }
    }
?>