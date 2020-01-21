<!-- Menu admin -->
    <h2> Page Admin </h2>
    <div class="center" style="margin-bottom: 30px">
        <nav class="nav-wrapper white">
              <div class="col s12" >
                <ul class="left">
                    <li><a class="black-text" href="./index.php?controller=admin&action=build_statistique">Statistiques</a></li>
                    <li><a class="black-text" href="./index.php?controller=admin&action=build_formulaire_update">Update</a></li>
                </ul>
                <ul class="right">
                    <li><a class="black-text" href="./index.php?controller=admin&action=build_adminAccueil&id=1">Accueil</a></li>

                    <li><a class="black-text" href="./index.php?controller=blog&action=buildAdmin">Blog</a></li>
                    <li><a class="black-text" href="./index.php?controller=avis&action=buildAdminAvisValider">Avis</a></li>
                    
                    <?php
                        foreach ($tab_page as $page) {
                            echo '<li> <a class="black-text" href="./index.php?controller=admin&action=build_admin&id='. $page->getIdChambre() .'">'. $page->getNomChambre() .' </a> </li>';
                    }
                    ?>
                    <li><a class="black-text" href="./index.php?controller=admin&action=build_ajoutChambre">Ajouter une chambre</a></li>
                </ul>
            </div> 
        </nav> 
    </div>	