<?php
    namespace helpers;

    class ComicHelper{
        /**
         * Sends a get request
         */
        public function get(string $url, array $params = array()){
            $options = array(
                'http' => array(
                    'method'  => 'GET',
                    'content' => http_build_query($params)
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            return json_decode($result);
        }
        /**
        * Gets today's comic
        */
        public function getTodayComic(){
            $today = $this->get("https://xkcd.com/info.0.json");

            return $today;
        }
        /**
         * Gets a comic by id
         */
        public function getComicById(int $id){
            $comic = $this->get("https://xkcd.com/$id/info.0.json");
            
            return $comic;
        }
        public function getSafeComicById(int $id){
            $id_ok = $id;

            $today = $this->getTodayComic();

            if($id > $today->num){
                return null;
            }
            while($model == null && $id_ok <= $today->num){
                $model = $this->getComicById($id_ok);
                if($model == null)
                    $id_ok++;
            }
            if($model != null){
                $model->real_id = $id_ok;
                $model->change_url = $id != $id_ok;
                $model->last = $today->num;
                
                return $model;
            }
        }
    }
?>