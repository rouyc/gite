<?php
session_start();
?>
        <div class="col s12">
            <div class="card">
<div class="card-content">
<form method="post" action="../index.php?controller=admin&action=build_connexion">
    <p>
        <label for="nom_id">Nom d'Utilisateur</label>
        <input type="text" name="nom" id="nom_id" required="">
    </p>
    <p>
        <label for="mdp_id">Mot de Passe</label>
        <input type="password" name="mdp" id="mdp_id" required="">
    </p>
    <p>
        <input type="submit" value="Connexion" />
    </p>
</form>	

</div>
</div>
</div>