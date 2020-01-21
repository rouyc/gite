        <!-- Modifier descrition -->
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <form action = "../index.php?controller=admin&action=modifDesc&id=<?php echo $_GET["id"]; ?>" method="post">
                            Votre description : <input type = "text" name = "description"><br/>
                            <input type = "submit" value = "Envoyer">
                        </form>
                        <div class="description">
                            <p> <strong> Description actuelle : </strong> 
                                <?php
                                    echo $description;
                                ?></p>
                        </div>
                        <br/>
                     </div>
                </div>
            </div>