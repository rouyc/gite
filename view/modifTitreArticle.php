<!-- Modifier titre -->
<h2> Modification titre</h2>
<div class="col s12">
    <div class="card">
        <div class="card-content">
            <form action = "../index.php?controller=blog&action=modifTitre&id=<?php echo $_GET["id"]; ?>" method="post">
                Nouveau titre : <input type = "text" name = "titreArticle"><br/>
                <input type = "submit" value = "Envoyer">
            </form>
            <div>
                <p> <strong> Titre actuel : </strong> <?php
                    echo $titreArticle;
                    ?></p>
            </div>
            <br/>
         </div>
    </div>
</div>