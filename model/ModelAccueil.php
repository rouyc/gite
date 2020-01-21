<?php
require_once File::build_path(array('model','Model.php'));

    class ModelAccueil
    {
        private $idAccueil;
        private $nomAccueil;
        private $descAccueil;
        private $url1;
        private $url2;
        private $url3;

        public function getIdAccueil() {return $this->idAccueil;}
        public function getNomAccueil() {return $this->nomAccueil;}
        public function getDescAccueil() {return $this->descAccueil;}
        public function getUrl1() {return $this->url1;}
        public function getUrl2() {return $this->url2;}
        public function getUrl3() {return $this->url3;}

        public static function getAll() {
            try{
                $sql = Model::$pdo -> query("SELECT * FROM Accueil");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $tab = $sql->fetch();
            return $tab;
        }

        public static function getDescription() {
            try{
                $sql = Model::$pdo -> query("SELECT * FROM Accueil");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $desc = $sql->fetch();
            return $desc['descAccueil'];
        }

        public static function getImage1() {
            try{
                $sql = Model::$pdo -> query("SELECT * FROM Accueil");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $desc = $sql->fetch();
            return $desc['url1'];
        }

        public static function getImage2() {
            try{
                $sql = Model::$pdo -> query("SELECT * FROM Accueil");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $desc = $sql->fetch();
            return $desc['url2'];
        }
        public static function getImage3() {
            try{
                $sql = Model::$pdo -> query("SELECT * FROM Accueil");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $desc = $sql->fetch();
            return $desc['url3'];
        }

        public static function modifIM1($texte,$id){

            try {$stmt = Model::$pdo->prepare("UPDATE `Accueil` SET `url1`= :texte WHERE idAccueil=:id");}
            catch (PDOException $e) {
                if (Conf::getDebug()) {echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $stmt->execute(array('texte' => $texte,
                'id' => $id));
        }

        // Test de l'image avant modification //
        public static function modifImage1($fichier,$id){
            $im = ModelAccueil::getImage1();
            $var = str_replace("images/","",$im);
            $fichier="images/".$var;
            $fichier= str_replace(" ","",$fichier);
            $array = array(
                "suppression" => "bar",
                "edit" => "foo",
            );



            if (file_exists($fichier)) {
                if (@unlink($fichier)) {
                    $array["suppression"]="Suppression de $fichier réussite </br>";
                } else {
                    $array["suppression"]="Echec de suppression de $fichier : $php_errormsg";
                }
            } else {
                $array["suppression"]="Le fichier $fichier n'existe pas </br>";

            }

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Vérifie si le fichier a été uploadé sans erreur.
                if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["photo"]["name"];
                    $filetype = $_FILES["photo"]["type"];
                    $filesize = $_FILES["photo"]["size"];

                    // Vérifie l'extension du fichier
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                    // Vérifie la taille du fichier - 5Mo maximum
                    $maxsize = 5 * 1024 * 1024;
                    if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                    // Vérifie le type MIME du fichier
                    if (in_array($filetype, $allowed)) {
                        // Vérifie si le fichier existe avant de le télécharger.
                        if (file_exists("upload/" . $_FILES["photo"]["name"])) {
                            $array["edit"]=$_FILES["photo"]["name"] . " existe déjà.";

                        } else {
                            move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);
                            $array["edit"]= "Votre fichier a été téléchargé avec succès.   ".$_FILES["photo"]["name"];


                            $adresse = "images/".$filename;
                            $adresse = str_replace(" ","",$adresse);
                            ModelAccueil::modifIM1($adresse,$id);
                        }
                    } else {
                        $array["edit"]= "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                    }
                } else {
                    echo "Error: " . $_FILES["photo"]["error"];
                }

            }
            return $array;
        }

        public static function modifIM2($texte,$id){

            try {$stmt = Model::$pdo->prepare("UPDATE `Accueil` SET `url2`= :texte WHERE idAccueil=:id");}
            catch (PDOException $e) {
                if (Conf::getDebug()) {echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $stmt->execute(array('texte' => $texte,
                'id' => $id));
        }

        // Test de l'image avant modification //
        public static function modifImage2($fichier,$id){
            $im = ModelAccueil::getImage2();
            $var = str_replace("images/","",$im);
            $fichier="images/".$var;
            $fichier= str_replace(" ","",$fichier);
            $array = array(
                "suppression" => "bar",
                "edit" => "foo",
            );



            if (file_exists($fichier)) {
                if (@unlink($fichier)) {
                    $array["suppression"]="Suppression de $fichier réussite </br>";
                } else {
                    $array["suppression"]="Echec de suppression de $fichier : $php_errormsg";
                }
            } else {
                $array["suppression"]="Le fichier $fichier n'existe pas </br>";

            }

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Vérifie si le fichier a été uploadé sans erreur.
                if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["photo"]["name"];
                    $filetype = $_FILES["photo"]["type"];
                    $filesize = $_FILES["photo"]["size"];

                    // Vérifie l'extension du fichier
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                    // Vérifie la taille du fichier - 5Mo maximum
                    $maxsize = 5 * 1024 * 1024;
                    if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                    // Vérifie le type MIME du fichier
                    if (in_array($filetype, $allowed)) {
                        // Vérifie si le fichier existe avant de le télécharger.
                        if (file_exists("upload/" . $_FILES["photo"]["name"])) {
                            $array["edit"]=$_FILES["photo"]["name"] . " existe déjà.";

                        } else {
                            move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);
                            $array["edit"]= "Votre fichier a été téléchargé avec succès.   ".$_FILES["photo"]["name"];


                            $adresse = "images/".$filename;
                            $adresse = str_replace(" ","",$adresse);
                            ModelAccueil::modifIM2($adresse,$id);
                        }
                    } else {
                        $array["edit"]= "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                    }
                } else {
                    echo "Error: " . $_FILES["photo"]["error"];
                }

            }
            return $array;
        }


        public static function modifIM3($texte,$id){

            try {$stmt = Model::$pdo->prepare("UPDATE `Accueil` SET `url3`= :texte WHERE idAccueil=:id");}
            catch (PDOException $e) {
                if (Conf::getDebug()) {echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $stmt->execute(array('texte' => $texte,
                'id' => $id));
        }

        // Test de l'image avant modification //
        public static function modifImage3($fichier,$id){
            $im = ModelAccueil::getImage3();
            $var = str_replace("images/","",$im);
            $fichier="images/".$var;
            $fichier= str_replace(" ","",$fichier);
            $array = array(
                "suppression" => "bar",
                "edit" => "foo",
            );



            if (file_exists($fichier)) {
                if (@unlink($fichier)) {
                    $array["suppression"]="Suppression de $fichier réussite </br>";
                } else {
                    $array["suppression"]="Echec de suppression de $fichier : $php_errormsg";
                }
            } else {
                $array["suppression"]="Le fichier $fichier n'existe pas </br>";

            }

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Vérifie si le fichier a été uploadé sans erreur.
                if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["photo"]["name"];
                    $filetype = $_FILES["photo"]["type"];
                    $filesize = $_FILES["photo"]["size"];

                    // Vérifie l'extension du fichier
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                    // Vérifie la taille du fichier - 5Mo maximum
                    $maxsize = 5 * 1024 * 1024;
                    if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                    // Vérifie le type MIME du fichier
                    if (in_array($filetype, $allowed)) {
                        // Vérifie si le fichier existe avant de le télécharger.
                        if (file_exists("upload/" . $_FILES["photo"]["name"])) {
                            $array["edit"]=$_FILES["photo"]["name"] . " existe déjà.";

                        } else {
                            move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);
                            $array["edit"]= "Votre fichier a été téléchargé avec succès.   ".$_FILES["photo"]["name"];


                            $adresse = "images/".$filename;
                            $adresse = str_replace(" ","",$adresse);
                            ModelAccueil::modifIM3($adresse,$id);
                        }
                    } else {
                        $array["edit"]= "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                    }
                } else {
                    echo "Error: " . $_FILES["photo"]["error"];
                }

            }
            return $array;
        }



        public static function getNom() {
            try{
                $sql = Model::$pdo -> query("SELECT * FROM Accueil ");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            $nom = $sql->fetch();
            return $nom['nomAccueil'];
        }
        public static function modifDesc($texte,$id){

            try {$stmt = Model::$pdo->prepare("UPDATE `Accueil` SET `descAccueil`=:texte WHERE idAccueil=:id");}

            catch (PDOException $e) {
                if (Conf::getDebug()) {echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $stmt->execute(array('texte' => $texte,
                'id' => $id));
        }
    }