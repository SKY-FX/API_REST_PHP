<?php
    require_once 'controllers/back/securityClass.php';
    require_once 'models/back/ADMIN_manager.php';

    class API_admin 
    {
        private $adminManager;

        public function __construct()
        {
            $this->adminManager = new ADMIN_manager();
        }

        public function getPageLogin(){
            $badRequest = $this->adminManager->getBadRequest();
            require_once "views/loginView.php";
        }

        public function getPageDatas(){
            if (securityClass::verifAccessSession())
            {
                require_once "views/datasView.php";
            }
            else
            {
                header('Location: '.URL.'back/login');
            }
        }

        public function getAccueilAdmin(){
            if (securityClass::verifAccessSession())
            {
                require_once "views/accueilView.php";
            }
            else
            {
                header('Location: '.URL.'back/login');
            }
        }

        public function connection(){
           
            if (!empty($_POST['email']) && !empty($_POST['password']))
            {
                $email = securityClass::securityHTML($_POST['email']);
                $password = securityClass::securityHTML($_POST['password']);

                if ($this->adminManager->isConnectionValid($email,$password))
                {
                    $_SESSION['access'] = 'admin';
                    // echo "Le mot de passe est OK";
                    header('Location: '.URL.'back/admin');
                }
                else{
                    // echo "Le mot de passe n'est pas valide";
                    header('Location: '.URL.'back/login');
                }
                
            }
            else
            {
                // echo "Les informations de l'administrateur ne sont pas présentes";
                header('Location: '.URL.'back/login');
            }   
        }

        public function deconnection(){
            session_destroy();
            header('Location: '.URL.'back/login');
        }
    }