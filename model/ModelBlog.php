<?php 

    require_once File::build_path(array('model','Model.php'));    
    class ModelBlog{
        
        private $idArticle;
        private $titreArticle;
        private $contenuArticle;
        private $Image;

        public function getIdArticle() {return $this->idArticle;}
        public function getTitreArticle() {return $this->titreArticle;}
        public function getContenuArticle() {return $this->contenuArticle;}
        public function getImage() {return $this->Image;}

        public static function getAll(){

            try{ $rep = Model::$pdo->query("SELECT * FROM Blog");}
             
            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();} 
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelBlog');
            $tab_article = $rep->fetchAll();

            return $tab_article;
        }  

        public static function ajouterArticle($titreArticle,$contenuArticle){

            // Vérifier si le formulaire a été soumis
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Vérifie si le fichier a été uploadé sans erreur.
                if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                    echo "oui";
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
                $stmt = Model::$pdo->prepare("INSERT INTO Blog (titreArticle,contenuArticle,Image) VALUES (:titreArticle, :contenuArticle, :filename)");

            } catch (PDOException $e) {
                echo $e->getMessage(); // affiche un message d'erreur
                die();
            }
            $stmt->execute(array('titreArticle' => $titreArticle,
                'contenuArticle' => $contenuArticle,
                'filename' => $filename));
        }   

        public static function supprimerArticle($id){
            try {
                $stmt = Model::$pdo->prepare("DELETE FROM Blog WHERE idArticle=:id");

            } catch (PDOException $e) {
                echo $e->getMessage(); // affiche un message d'erreur
                die();
            }
            $stmt->execute(array('id' => $id));
        }

        // Modification du titre //
        public static function modifTitre($texte,$id){

            try {$stmt = Model::$pdo->prepare("UPDATE `Blog` SET `titreArticle`=:texte WHERE idArticle=:id");}

            catch (PDOException $e) {
                if (Conf::getDebug()) {echo $e->getMessage();} 
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $stmt->execute(array('texte' => $texte,
                'id' => $id));
        }

        // Modification du contenu //
        public static function modifContenu($texte,$id){

            try {$stmt = Model::$pdo->prepare("UPDATE `Blog` SET `contenuArticle`= :texte  WHERE idArticle=:id");}

            catch (PDOException $e) {
                if (Conf::getDebug()) {echo $e->getMessage();} 
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $stmt->execute(array('texte' => $texte,
                'id' => $id));
        }

        public static function getTitre($id) {
            try{
                $sql = Model::$pdo -> prepare("SELECT * FROM Blog WHERE idArticle=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }

            $sql->execute(array('id' => $id));
            $titre = $sql->fetch();

            return $titre['titreArticle'];
        }

        public static function getContenu($id) {
            try{
                $sql = Model::$pdo -> prepare("SELECT * FROM Blog WHERE idArticle=:id");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $sql->execute(array('id' => $id));
            $contenu = $sql->fetch();

            return $contenu['contenuArticle'];
        }
        
    }
?>