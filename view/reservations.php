<!-- Reservation -->
    <div class="col s12 l6">
        <div class="card">
            <div class="card-content">
                <p> Réservations en attente :</p></br>
                <?php 
                    foreach ($tab_resEnAttente as $resEA) {
                        echo '<div class="card">
                                <div class="card-content">
                                    Réservation de ' . $resEA->getNomClient() . ' ' . $resEA->getPrenomClient() . ' du ' . $resEA->getdateDebut() . ' au ' . $resEA->getdateFin() . '<br><a class="waves-effect waves-light btn-small" href='.'./index.php?controller=admin&action=refRes&id='.$_GET['id'].'&idR='. $resEA->getIdReservation().'&email=' . $resEA->getEmailClient() . '>Refuser</a>'.'<a class="waves-effect waves-light btn-small" href='.'./index.php?controller=admin&action=valRes&id='.$_GET['id'].'&idR='. $resEA->getIdReservation(). '&email=' . $resEA->getEmailClient() . '>Valider</a>
                                </div>
                            </div>';
                    }
                ?> 
                <p> Réservations validées :</p></br>
                <?php 
                    foreach ($tab_reservation as $resV) {
                        echo 'Réservation de ' . $resV->getNomClient() . ' ' . $resV->getPrenomClient() . ' du ' . $resV->getdateDebut() . ' au ' . $resV->getdateFin() . '<a class="waves-effect waves-light btn-small" href='.'./index.php?controller=admin&action=refRes&id='.$_GET['id'].'&idR='. $resV->getIdReservation().'&email=' . $resV->getEmailClient() . '>Refuser</a><br>';
                    }
                ?>
                </br><p> Réservations refusées :</p></br>
                <?php
                foreach ($tab_resRefusee as $resF) {
                    echo 'Réservation de ' . $resF->getNomClient() . ' ' . $resF->getPrenomClient() . ' du ' . $resF->getdateDebut() . ' au ' . $resF->getdateFin() . '<a class="waves-effect waves-light btn-small" href='.'./index.php?controller=admin&action=valRes&id='.$_GET['id'].'&idR='. $resF->getIdReservation(). '&email=' . $resF->getEmailClient() . '>Valider</a><br>';
                }
                ?>
            </div>
        </div>
    </div>
</div>