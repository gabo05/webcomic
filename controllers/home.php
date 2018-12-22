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
            $id_ok = $id;

            $today = $helper->getTodayComic();

            if($id > $today->num){
                return $this->view('404');
            }
            while($model == null && $id_ok <= $today->num){
                $model = $helper->getComicById($id_ok);
                if($model == null)
                    $id_ok++;
            }
            if($model != null){
                $model->real_id = $id_ok;
                $model->change_url = $id != $id_ok;
                $model->last = $today->num;
                
                return $this->view('index', $model);
            }
            return $this->view('404');
        }
    }
?>