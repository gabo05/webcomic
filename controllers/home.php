<?php
    namespace controllers;

    class HomeController extends \base\Controller{

        public function index(array $params) {
            
            $helper = new \helpers\ComicHelper();

            $model = $helper->getTodayComic();

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