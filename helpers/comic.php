<?php
    namespace helpers;

    class ComicHelper{
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
        public function getTodayComic(){
            $today = $this->get("https://xkcd.com/info.0.json");

            return $today;
        }
    }
?>