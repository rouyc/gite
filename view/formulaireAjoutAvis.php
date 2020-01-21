<!-- Formulaire d'ajout d'un article -->
<div class="col s12" xmlns="http://www.w3.org/1999/html">
    <div class="card">
        <div class="card-content">
            <div class="input-field col s12">
            <form action="../index.php?controller=avis&action=ajoutAvis" method="post">
                <legend>Laissez votre avis</legend><br>
                <p>
                    <label for="nom_id">Nom</label>
                    <input type="text" name="nomClientAvis" id="nom_id" required/>
                </p>
                <p>
                    <label for="prenom_id">Prénom</label>
                    <input type="text" name="prenomClientAvis" id="prenom_id" required/>
                </p>

                <script>
                    $(document).ready(function(){
                        $('select').formSelect();
                    });
                </script>
                    <label>
                        <select name="chambre" id="chambre-select">
                            <option value="" disabled selected>Choisissez la chambre sur laquelle déposer un avis</option>

                            <?php
                            foreach ($tab_page as $page) {
                                echo '<option value="'.$page->getIdChambre().'">'.$page->getNomChambre().'</option>';
                            }
                            ?>
                        </select>
                    </label>



                <p>
                    <label>Commentaire</label>
                    <textarea name="commentaire" required></textarea><br>
                </p>
                <p><span>Note : </span></p>
                <div class="row">
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="0" checked />
                                <span>0</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="1"/>
                                <span>1</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="2"/>
                                <span>2</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="3"/>
                                <span>3</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio"  value="4"/>
                                <span>4</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="5"/>
                                <span>5</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="6"/>
                                <span>6</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="7"/>
                                <span>7</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="8"/>
                                <span>8</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="9"/>
                                <span>9</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1">
                        <p>
                            <label>
                                <input class="with-gap" name="note" type="radio" value="10" />
                                <span>10</span>
                            </label>
                        </p>
                    </div>
                </div>
                <br>
                <input type="submit" name="submit" value="Ajouter">
            </form>
            </div>
        </div>
    </div>
</div>