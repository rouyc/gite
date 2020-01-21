<!-- Modifier nom -->
<h2> Modification </h2>
<div class="col s12">
    <div class="card">
        <div class="card-content">
            <form action = "../index.php?controller=admin&action=modifNom&id=<?php echo $_GET["id"]; ?>" method="post">
                Nouveau nom : <input type = "text" name = "nom"><br/>
                <input type = "submit" value = "Envoyer">
            </form>
            <div class="description">
                <p> <strong> Nom actuel : </strong> <?php
                    echo $nom;
                    ?></p>
            </div>
            <br/>
         </div>
    </div>
</div>