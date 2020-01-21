<h1 class = "center">Avis</h1>
<div class="col s12">
    <div class="card">
        <div class="card-content">
            <?php
            require_once File::build_path(array('model','ModelChambre.php'));
            foreach ($tab_avis as $avis) {
                $nomChambreAvis = ModelChambre::getNom($avis->getIdChambre());
                $noteInf = 10 - $avis->getNoteAvis();
                $note = $avis->getNoteAvis();
                $etoile = "";
                for ($i = 1; $i <= $note; $i++) {
                    $etoile = $etoile . "★";
                }
                for ($i = 1; $i<=$noteInf; $i++){
                    $etoile = $etoile . "☆";
                }
                echo '<div class="col s12">
                                <div class="card">
                                    <div class="card-content"> <blockquote class="blue lighten-5"> Avis de : '. $avis->getNomClientAvis() ." " . $avis->getPrenomClientAvis() . ' 
                                    <br> Pour : ' . $nomChambreAvis . '</blockquote><br>' .  $avis->getTexteAvis() . '<br> Note : <div class="yellow-text text-darken-3"> <h6>'
                                    . $etoile . '</h6></div>
                                    </div>
                                </div>
                            </div>';
            }
            ?>
        </div>
    </div>
</div>
