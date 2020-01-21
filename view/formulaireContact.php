				<div class="col s12 l6">
	        		<div class="card">
	          			<div class="card-content">
	          				<form method="post">
						        <label>Email</label>
						        <input type="email" name="email" required><br>
						        <label>Message</label>
						        <textarea name="message" required></textarea><br>
						        <input type="submit" value="Envoyer">
						    </form>
						    <?php
						    if (isset($_POST['message'])) {
						        $position_arobase = strpos($_POST['email'], '@');
						        $message = 'Email : ' . $_POST['email'] . ' Message : ' . $_POST['message'];
						        if ($position_arobase === false)
						            echo '<p>Votre email doit comporter un arobase.</p>';
						        else {
						            $retour = mail('clementgalzi@gmail.com', 'Envoi depuis la page Contact', $message, 'From: ' . $_POST['email']);
						            if($retour)
						                echo '<p>Votre message a été envoyé.</p>';
						            else
						                echo '<p>Erreur.</p>';
						        }
						    }
						    ?>
	          			</div>
	        		</div>
	      		</div>
	    	</div>
    