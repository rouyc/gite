<!-- Modifier un article -->
	<div class="card">
	    <div class="card-content ">
			<?php
			    foreach ($tab_article as $article)
			        echo '<div class="card">
			    			<div class="card-content ">
				    			<div class="valign-wrapper row">
				    				<div class="col s1">
				    					<p>' . $article->getIdArticle() . '</p>
					    			</div>
					    			<div class=" col s7">
					    				<p>' . $article ->getTitreArticle(). '</p>
				    				</div>
				    				<div class="col s2"> 
				    					<h6> 
				    				 		<a class=\'waves-effect waves-light btn\' href=\'./index.php?controller=blog&action=buildAdminModifArticle&id=' . rawurlencode($article->getIdArticle()) . '\'>Modifier</a></p>
				    					</h6>
				    					<h6>
				    				 		<a class=\'waves-effect waves-light btn\' href=\'./index.php?controller=blog&action=supprimerArticle&id=' . rawurlencode($article->getIdArticle()) . '\'>Supprimer</a></p>
				    					</h6>
				    				</div>
				    			</div>
			      			</div>
						</div>';
			?>
		</div>
	</div>