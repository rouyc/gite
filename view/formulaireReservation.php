				<div class="col s12 l6">
	        		<div class="card">
	          			<div class="card-content">
	          				<form method="post" action="../index.php?controller=chambre&action=addRes&id=<?php echo $_GET["id"]; ?>">
							    <legend>Réservation :</legend>
							    <p>
							      <label for="nom_id">Nom</label>
							      <input type="text" name="nom" id="nom_id" required/>
							    </p>
							    <p>
							      <label for="prenom_id">Prénom</label>
							      <input type="text" name="prenom" id="prenom_id" required/>
							    </p>
							    <p>
							      <label for="email_id">Email</label>
							      <input type="email" name="email" id="email_id" required/>
							    </p>
							    <p>
							      <label for="datedebut_id">Date début</label>
							      <input type="date" name="datedebut" id="datedebut_id" required/>
							    </p>
							    <p>
							      <label for="datefin_id">Date fin</label>
							      <input type="date" name="datefin" id="datefin_id" required/>
							    </p>
							    <p>
							      <input type="submit" value="Envoyer" />
							    </p>
							
                            <?php
                                $position_arobase = strpos($_POST['email'], '@');
                                $message = 'Nouvelle réservation au nom de : "' . $_POST[nom] . '" et prénom : "' . $_POST[prenom] .
                                    '" email de contact : "' . $_POST[email] . '" date de début de reservation : ' . $_POST[datedebut] .
                                    ' date de fin : ' . $_POST[datefin] . '.';
                                $date1 = new DateTime($_POST['datedebut']);
                                $date2 = new DateTime($_POST['datefin']);
                                if ($position_arobase === false){
                                    echo '<p>Votre email doit comporter un arobase.</p>';}

                                else if ($date1 > $date2){
                                    echo '<h6 class="red-text"> Erreur, dates invalides </h6>';

                                }
                                else{
	                                $date = $date1;
	                                $res = 1;
	                                while ($date <= $date2 && $res == 1) {
	                                   	foreach ($tab_reservation as $reservation) {
	                                        $dateDebut = new DateTime($reservation->getDateDebut());
	                                        $dateFin = new DateTime($reservation->getDateFin());
	                                        if ($date>=$dateDebut && $date<=$dateFin) {
	                                            $res = 0;
	                                        }
	                                    }
	                                    $date->modify('+1 day');
	                                }
	                                if($res == 0){
	                                	echo '<h6 class="red-text"> Erreur, dates invalides </h6>';
	                                }
	                                else if ($res == 1){
	                                    $retour = mail('clementgalzi@gmail.com', 'Nouvelle demande de réservation', $message, 'From: ' . $_POST['email']);
	                                    if($retour)
	                                        echo '<p>Votre message a été envoyé.</p>';
	                                    else
	                                        echo '<p>Erreur.</p>';
	                                }
	                            }
                            ?>
                            </form>
	          			</div>
	        		</div>
	      		</div>
	    	</div>