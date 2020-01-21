<?php
require_once('Model.php');
    class ModelImages{

        private $adresse;

        public function __construct($a = NULL) {
            if (!is_null($a)) {
                $this->adresse = $a;
            }
        }

        public static function getImage()
        {
            $sql = Model:: $pdo->query('SELECT image FROM accueil');
            $sql->setFetchMode(PDO::FETCH_CLASS, 'accueil');
            $desc = $sql->fetchAll();
            return $desc;

        }

        /**
         * @return null
         */
        public function getAdresse()
        {
            return $this->adresse;
        }
    }
?>