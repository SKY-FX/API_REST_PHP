<?php
    class securityClass
    {
        public static function securityHTML($string)
        {
            return htmlentities($string);
        }

        public static function verifAccessSession()
        {
            return (!empty($_SESSION['access']) && $_SESSION['access'] === "admin");
        }
    }