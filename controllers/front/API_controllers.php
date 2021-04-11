<?php
    require_once 'models/front/API_manager.php';
    require_once 'models/models.php';

    class API_controllers
    {
        private $api_manager;

        public function __construct()
        {
            $this->api_manager = new API_manager();
        }

        public function get_frontEndDatas ()
        {
            // echo 'Demande des données FrontEnd';echo "<br>";
            $datas = $this->api_manager->getDB_Datas();

            // Envoie au format JSON
            models::sendJSON($datas);
            // return $datas;
        }
    }