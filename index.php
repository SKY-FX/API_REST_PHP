<?php 
//http://localhost/...
//https://www.h2prog.com/...
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once 'controllers/front/API_controllers.php';
require_once 'controllers/back/ADMIN_controllers.php';
require_once 'controllers/back/DATAS_controllers.php';

$api_controllers = new API_controllers();
$api_datas = new DATA_controllers();
$api_admin = new API_admin();

try{
    if (empty($_GET['page']))
    {
        throw new Exception('Aucune page n\'est indiquée');
    }
    else{
        //Convertie l'url en tableau
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));
        // echo 'L\'url /' .$_GET['page']. ' a été trouvée';
        // echo "<br>";

        if ($url[0] === 'front')
        {
            // echo 'Vous êtes sur la page FrontEnd';echo "<br>";
            $api_controllers -> get_frontEndDatas();
        }
        else if ($url[0] === 'back')
        {
            if (!empty($url[1]))
            {
                if ($url[1] === 'login') {
                    $api_admin -> getPageLogin(); 
                }
                else if ($url[1] === 'connection') {
                    $api_admin -> connection(); 
                }
                else if ($url[1] === 'datas') {
                    $api_datas -> get_datas(); 
                }
                else if ($url[1] === 'clients') {
                    $api_datas -> get_clients(); 
                }
                else if ($url[1] === 'admin') {
                    $api_admin -> getAccueilAdmin(); 
                }
                else if ($url[1] === 'deconnection') {
                    $api_admin -> deconnection(); 
                }
                else {throw new Exception('L\'url /' .$_GET['page']. ' n\'existe pas');}
            }
            else {throw new Exception('L\'url /' .$_GET['page']. ' n\'existe pas');}
        }
        else{
            throw new Exception('La page ' .$url[0]. ' n\'existe pas');
        }
    }
} 
catch (Exception $e){
    $msg = $e->getMessage();
    echo $msg;
}
