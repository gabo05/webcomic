<?php
    namespace controllers;

    class HomeController extends \base\Controller{

        public function index(array $params) {
            $model = new \stdClass();
            $model->message = 'Hello!!';
            return $this->view('index', $model);
        }
        public function data(){
            $model = new \stdClass();
            $model->code = 200;
            $model->message = 'Hello!!';
            return $this->json($model);
        }
    }
?>