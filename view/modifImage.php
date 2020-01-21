        <!-- Modifier image -->
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <form action="../index.php?controller=admin&action=modifImage1&id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
                            <label for="fileUpload">Fichier:</label>
                            <input type="file" name="photo" id="fileUpload">
                            <input type="submit" name="submit" value="Upload">
                            <p> <strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
                            <div class="image">
                                <p> <strong class="texte_image">Image d'accueil actuelle :</strong>
                                    <?php
                                    $res = str_replace(' ', '', $image1);
                                    echo "<img src=\"$res\" alt =\"n1\" style=\"width:50%\">";
                                    ?>
                                </p>
                            </div>
                        </form>
                        <form action="../index.php?controller=admin&action=modifImage2&id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
                            <label for="fileUpload">Fichier:</label>
                            <input type="file" name="photo" id="fileUpload">
                            <input type="submit" name="submit" value="Upload">
                            <p> <strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
                            <div class="image">
                                <p> <strong class="texte_image">Image d'accueil actuelle :</strong>
                                    <?php
                                    $res = str_replace(' ', '', $image2);
                                    echo "<img src=\"$res\" alt =\"n1\" style=\"width:50%\">";
                                    ?>
                                </p>
                            </div>
                        </form>
                        <form action="../index.php?controller=admin&action=modifImage3&id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
                            <label for="fileUpload">Fichier:</label>
                            <input type="file" name="photo" id="fileUpload">
                            <input type="submit" name="submit" value="Upload">
                            <p> <strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
                            <div class="image">
                                <p> <strong class="texte_image">Image d'accueil actuelle :</strong>
                                    <?php
                                    $res = str_replace(' ', '', $image3);
                                    echo "<img src=\"$res\" alt =\"n1\" style=\"width:50%\">";
                                    ?>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>