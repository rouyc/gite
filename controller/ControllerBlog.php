<?php /** @noinspection PhpIncludeInspection */
    
    require_once (File::build_path(array('model','ModelChambre.php')));
    require_once (File::build_path(array('model','ModelBlog.php')));
	
	class ControllerBlog{

		public static function build() {
            $tab_article = ModelBlog::getAll();
            $tab_page = ModelChambre::getAll();
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','blog.php'));
                require File::build_path(array('view','footer.html'));
            }
            else{
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','blog.php'));
                require File::build_path(array('view','footer.html'));
            }
        }

        public static function buildAdmin() {
            $tab_article = ModelBlog::getAll();
            $tab_page = ModelChambre::getAll();
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','formulaireAjoutArticle.php'));
                require File::build_path(array('view','modifBlog.php'));
                require File::build_path(array('view','footer.html'));
            }
            else{
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','blog.php'));
                require File::build_path(array('view','footer.html'));
            }
        }

        public static function buildAdminModifArticle() {
            $id = $_GET['id'];
            $tab_article = ModelBlog::getAll();
            $tab_page = ModelChambre::getAll();
            $titreArticle = ModelBlog::getTitre($id);
            $contenuArticle = ModelBlog::getContenu($id);
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','modifTitreArticle.php'));
                require File::build_path(array('view','modifContenuArticle.php'));
                require File::build_path(array('view','footer.html'));
            }
            else{
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','blog.php'));
                require File::build_path(array('view','footer.html'));
            }
        }

        public static function buildAdminAjouterArticle() {
            $tab_article = ModelBlog::getAll();
            $tab_page = ModelChambre::getAll();
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','formulaireAjoutArticle.php'));
                require File::build_path(array('view','footer.html'));
            }
            else{
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','blog.php'));
                require File::build_path(array('view','footer.html'));
            }
        }

        public static function ajoutArticle() {
            ModelBlog::ajouterArticle($_POST['nomArticle'],$_POST['contenuArticle']);
            ControllerBlog::buildAdmin();
        }

        // Supprimer un article //
        public static function supprimerArticle() {
            $id = $_GET['id'];
            ModelBlog::supprimerArticle($id);
            ControllerBlog::buildAdmin();
        }


         // Modifier titre d'un article //
        public static function modifTitre() {
            $id = $_GET['id'];
            ModelBlog::modifTitre($_POST["titreArticle"],$id);
            ControllerBlog::buildAdmin();
        }

 // Modifier contenu d'un article //
        public static function modifContenu() {
            $id = $_GET['id'];
            ModelBlog::modifContenu($_POST["contenuArticle"],$id);
            ControllerBlog::buildAdmin();

        }
	}	
?>