<!-- Accepter un avis -->
	<div class="card">
	    <div class="card-content ">
			<?php
			    foreach ($tab_avis as $avis)

			        echo '<div class="card">
			    			<div class="card-content ">
				    			<div class="valign-wrapper row">
				    				<div class="col s1">
				    					<p>' . $avis->getTexteAvis() . '</p>
				    									</div>
				    				<div class="col s2"> 
				    					<h6> 
				    				 		<a class=\'waves-effect waves-light btn\' href=\'./index.php?controller=avis&action=setAvis1&id=' . rawurlencode($avis->getIdAvis()) . '\'>Valider</a></p>
				    					</h6>
				    					<h6>
				    				 		<a class=\'waves-effect waves-light btn\' href=\'./index.php?controller=avis&action=setAvis2&id=' . rawurlencode($avis->getIdAvis()) . '\'>Refuser</a></p>
				    					</h6>
				    				</div>
				    			</div>
			      			</div>
						</div>';
			?>
		</div>
	</div>