<?php

require_once 'models/models.php';

class ADMIN_manager extends models
{
    public $badRequest = false;

    public function getBadRequest ()
    {
        return $this->badRequest;
    }

    private function getConfigUSer($email)
    {
        $req = "
            SELECT 
                mot_de_passe, email
            FROM 
                clients 
            WHERE 
                email LIKE '%".$email."%'
            ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $datas = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }


    public function isConnectionValid($email,$password)
    {
        $email_admin = "francois-chabaud@gmail.fr";
        $adminConfig = $this->getConfigUSer($email_admin);
        // return password_verify($password, $password_DB);
        $passWordIsOk = ($adminConfig['mot_de_passe'] === $password) ? true : false;
        $emailIsOk = ($adminConfig['email'] === $email) ? true : false;
        $isOk = $passWordIsOk && $emailIsOk;

        $this->badRequest = $isOk;
        return ($isOk);
    }

}