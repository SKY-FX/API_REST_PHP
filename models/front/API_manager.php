<?php

require_once 'models/models.php';

    class API_manager extends models
    {
        public function getDB_Datas ()
        {
            $req = "SELECT * from images";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->execute();
            $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            // echo '<pre>';
            //     print_r($datas);
            // echo '</pre>';
            return $datas;
        }
    }