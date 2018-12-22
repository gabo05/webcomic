<?php
    namespace controllers;

    class HomeController extends \base\Controller{

        public function index(array $params) {
            
            $helper = new \helpers\ComicHelper();

            $model = $helper->getTodayComic();
            $mode->last = $model->num;

            return $this->view('index', $model);
        }
        public function comic(array $params){
            $helper = new \helpers\ComicHelper();
            //var_dump
            $model = $helper->getComicById(intval($params[3]));
            $model->last = $helper->getTodayComic()->num;

            return $this->view('index', $model);
        }
    }
?>