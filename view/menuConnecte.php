<!-- Menu -->
<div class="center" id="menu">
    <nav class="nav-wrapper white">
        <div class="col s12" >
            <ul class="left">
                <li><a class="black-text" href="./index.php">Accueil</a></li>
                <?php
                foreach ($tab_page as $page) {
                    echo '<li> <a class="black-text" href="./index.php?controller=chambre&action=build_chambre&id='. $page->getIdChambre() .'">'. $page->getNomChambre() .' </a> </li>';
                }
                ?>

            </ul>
            <ul class="right">
                <li><a class="black-text" href="./index.php?controller=avis&action=ajouterAvis">Ajouter avis</a></li>
                <li><a class="black-text" href="./index.php?controller=avis&action=build">Avis</a></li>
                <li><a class="black-text" href="./index.php?controller=blog&action=build">Blog</a></li>
                <li><a class="black-text" href="./index.php?controller=contact&action=build">Contact</a></li>
                <li><a class="black-text" href="./index.php?controller=admin&action=deconnexion">Deconnexion </a></li>
            </ul>
        </div>
    </nav>
</div>