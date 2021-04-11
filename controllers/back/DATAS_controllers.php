<?php
    require_once 'models/back/DATA_manager.php';
    require_once 'models/models.php';

    class DATA_controllers
    {
        private $data_manager;

        public function __construct()
        {
            $this->data_manager = new DATA_manager();
        }

        public function get_datas()
        {
            if (securityClass::verifAccessSession())
            {
                $datas = $this->data_manager->getDatas();
                require_once "views/datasView.php";
            }
            else
            {
                header('Location: '.URL.'back/login');
            }            
        }

        public function get_clients()
        {
            if (securityClass::verifAccessSession())
            {
                $clients = $this->data_manager->getclients();
                require_once "views/clientsView.php";
            }
            else
            {
                header('Location: '.URL.'back/login');
            }
        }
    }