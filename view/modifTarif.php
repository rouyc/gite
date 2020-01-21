        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <form action = "../index.php?controller=admin&action=modifTarif&id=<?php echo $_GET["id"]; ?>" method="post">
                        Votre tarif : <input type = "text" name = "tarif"><br/>
                        <input type = "submit" value = "Envoyer">
                    </form>
                    <div>
                        <p> <strong> Tarif actuel : </strong>
                            <?php
                            echo $tarif;
                            ?></p>
                    </div>
                    <br/>
                </div>
            </div>
        </div>