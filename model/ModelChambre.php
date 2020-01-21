<?php



require_once File::build_path(array('model','Model.php'));
    
    class ModelChambre{
        private $idChambre;
        private $nomChambre;
        private $descChambre;
        private $url1;
        private $url2;
        private $url3;
        private $url4;
        private $tarifChambre;

        public function getUrl1() {return $this->url1;}
        public function getUrl2() {return $this->url2;}
        public function getUrl3() {return $this->url3;}
        public function getIdChambre(){return $this->idChambre;}
        public function getNomChambre(){return $this->nomChambre;}
        public function getDescChambre(){return $this->descChambre;}
        public function getUrl4(){return $this->url4;}
        public function getTarifChambre(){return $this->tarifChambre;}

        public static function getAll(){

            try{ $rep = Model::$pdo->query("SELECT * FROM Chambre");}

            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelChambre');
            $tab_page = $rep->fetchAll();

            return $tab_page;
        }

    
        public static function AddRese($nom,$prenom,$email, $debut, $fin){
            $date1 = new DateTime($_POST['datedebut']);
            $date2 = new DateTime($_POST['datefin']);
            $tarif = self::getTarif($_GET['id']);
            $tarifF = 0;
            while ($date1<=$date2) {
                $tarifF = $tarifF + $tarif;
                $date1->modify('+1 day');
            }

            try {
                $idChambre = $_GET['id'];
                $stmt = Model::$pdo->prepare("INSERT INTO reservation (nomClient,prenomClient,emailClient,dateDebut,dateFin,idChambre,prixReservation) VALUES (:nom,:prenom,:email,:debut,:fin,:idChambre,:tarifF)");
            } 
            catch (PDOException $e) {
                echo $e->getMessage(); // affiche un message d'erreur
                die();
            }
            $stmt->execute(array("nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "debut" => $debut,
                "fin" => $fin,
                "idChambre" => $idChambre,
                "tarifF" => $tarifF));
        }

        public static function addChambre($nom,$description,$tarif){

            // Vérifier si le formulaire a été soumis
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Vérifie si le fichier a été uploadé sans erreur.
                if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["photo"]["name"];
                    $filetype = $_FILES["photo"]["type"];
                    $filesize = $_FILES["photo"]["size"];

                    // Vérifie l'extension du fichier
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                    // Vérifie la taille du fichier - 5Mo maximum
                    $maxsize = 5 * 1024 * 1024;
                    if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                    // Vérifie le type MIME du fichier
                    if(in_array($filetype, $allowed)){
                        // Vérifie si le fichier existe avant de le télécharger.
                        if(file_exists("upload/" . $_FILES["photo"]["name"])){
                            echo $_FILES["photo"]["name"] . " existe déjà.";
                        } else{
                            move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);
                        }
                    } else{
                        echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                    }
                } else{
                    echo "Error: " . $_FILES["photo"]["error"];
                }
            }
            $filename = "images/".$filename;
            try {
                $stmt = Model::$pdo->prepare("INSERT INTO Chambre (nomChambre,descChambre,url1,tarifChambre) VALUES (:nom, :description, :filename,:tarif)");
            }
            catch (PDOException $e) {
                echo $e->getMessage(); // affiche un message d'erreur
                die();
            }



            $stmt->execute(array("nom" => $nom,
                "description" => $description,
                'filename' => $filename,
                'tarif' => $tarif));


        }

    public static function supprimerChambre($id){
            try {
                $stmt = Model::$pdo->prepare("DELETE FROM Chambre WHERE idChambre=:id");

            } catch (PDOException $e) {
                echo $e->getMessage(); // affiche un message d'erreur
                die();
            }
        $stmt->execute(array('id' => $id));
        }

        public static function getNombreReservation($id) {
            try {
                $stmt = Model::$pdo->query("SELECT COUNT(*) FROM reservation WHERE idChambre=$id")->fetchColumn();

            } catch (PDOException $e) {
                echo $e->getMessage(); // affiche un message d'erreur
                die();
            }
            return $stmt;
        }

        public static function getDescription($id) {
            try{
                $sql = Model::$pdo -> prepare("SELECT * FROM Chambre WHERE idChambre=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $sql->execute(array('id' => $id));
            $desc = $sql->fetch();

            return $desc['descChambre'];
        }

        public static function getImage1($id) {
            try{
                $sql = Model::$pdo -> prepare("SELECT * FROM Chambre WHERE idChambre=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $sql->execute(array('id' => $id));
            $desc = $sql->fetch();
            return $desc['url1'];
        }

        public static function getImage2($id) {
            try{
                $sql = Model::$pdo -> prepare("SELECT * FROM Chambre WHERE idChambre=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $sql->execute(array('id' => $id));
            $desc = $sql->fetch();
            return $desc['url2'];
        }

        public static function getImage3($id) {
            try{
                $sql = Model::$pdo -> prepare("SELECT * FROM Chambre WHERE idChambre=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $sql->execute(array('id' => $id));
            $desc = $sql->fetch();
            return $desc['url3'];
        }

        public static function getTarif($id) {
            try{
                $sql = Model::$pdo -> prepare("SELECT * FROM Chambre WHERE idChambre=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $sql->execute(array('id' => $id));
            $desc = $sql->fetch();
            return $desc['tarifChambre'];
        }

        public static function getNom($id) {
            try{
                $sql = Model::$pdo -> prepare("SELECT * FROM Chambre WHERE idChambre=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $sql->execute(array('id' => $id));
            $nom = $sql->fetch();
            return $nom['nomChambre'];
        }


    }

?>	