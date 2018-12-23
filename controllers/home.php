<?php
    namespace controllers;

    class HomeController extends \base\Controller{

        public function index(array $params) {
            
            $helper = new \helpers\ComicHelper();

            $model = $helper->getTodayComic();
            $model->last = $model->num;
            $model->real_id=$model->num;
            return $this->view('index', $model);
        }
        public function comic(array $params){
            $helper = new \helpers\ComicHelper();
            $id = intval($params[3]);
            
            $model = $helper->getSafeComicById($id);

            if($model != null){
                return $this->view('index', $model);
            }
            return $this->view('404');
        }
    }
?>