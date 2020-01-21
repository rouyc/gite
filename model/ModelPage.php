<?php /** @noinspection PhpIncludeInspection */

require_once File::build_path(array('model','Model.php'));

    class ModelPage {

        private $id;
        private $nomPage;
        private $descPage;
        private $url1;
        private $url2;
        private $url3;

        public function getId() {return $this->id;}
        public function getNomPage() {return $this->nomPage;}
        public function getDesPage() {return $this->descPage;}
        public function getUrl1() {return $this->url1;}
        public function getUrl2() {return $this->url2;}
        public function getUrl3() {return $this->url3;}

        public static function getAllChambre(){

            try{ $rep = Model::$pdo->query("SELECT * FROM Pages WHERE id > 1");}
             
            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();} 
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelPage');
            $tab_page = $rep->fetchAll();

            return $tab_page;
        }



        public static function getDescription($id) {
            try{
                $sql = Model::$pdo -> prepare("SELECT * FROM Pages WHERE id=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $sql->execute(array('id' => $id));
            $desc = $sql->fetch();
            return $desc['descPage'];
        }

        public static function getImage($id) {
             try{
               $sql = Model::$pdo -> prepare("SELECT * FROM Pages WHERE id=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
              }
            $sql->execute(array('id' => $id));
            $desc = $sql->fetch();
            return $desc['url1'];
        }

        public static function getNom($id) {
             try{
               $sql = Model::$pdo -> prepare("SELECT * FROM Pages WHERE id=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
              }
            $sql->execute(array('id' => $id));
            $nom = $sql->fetch();
            return $nom['nomPage'];
        }
    }
?>