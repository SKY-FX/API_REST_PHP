<?php

require_once 'models/models.php';

class DATA_manager extends models
{
    public function getClients()
    {
        $req = "
            SELECT 
                *
            FROM 
                clients 
            ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $clients;
    }

    public function getDatas()
    {
        $req = "
            SELECT 
                *
            FROM 
                images 
            ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }

}