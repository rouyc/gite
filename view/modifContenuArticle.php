<!-- Modifier contenu -->
<h2> Modification contenu</h2>
<div class="col s12">
    <div class="card">
        <div class="card-content">
            <form action = "../index.php?controller=blog&action=modifContenu&id=<?php echo $_GET["id"]; ?>" method="post">
                Nouveau contenu : <input type = "text" name = "contenuArticle"><br/>
                <input type = "submit" value = "Envoyer">
            </form>
            <div class="description">
                <p> <strong> Contenu actuel : </strong> <?php
                    echo $contenuArticle;
                    ?></p>
            </div>
            <br/>
         </div>
    </div>
</div>