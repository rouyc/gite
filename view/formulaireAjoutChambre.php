<!-- Formulaire d'ajout d'une chambre -->
<div class="col s12">
    <div class="card">
        <div class="card-content">

            <form action="../index.php?controller=admin&action=addChambre" method="post" enctype="multipart/form-data">
                <legend>Chambre</legend>
                <p>
                    <label for="titre_id">Titre</label>
                    <input type="text" name="nom" id="titre_id" required/>
                </p>
                <p>
                    <label for="description_id">Description</label>
                    <input type="text" name="description" id="description_id" required/>
                </p>
                <p>
                    <label for="description_id">Tarif</label>
                    <input type="text" name="tarif" id="tarif_id" required/>
                </p>
                <label for="fileUpload">Fichier:</label>
                <input type="file" name="photo" id="fileUpload">

                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>

                <input type="submit" name="submit" value="Ajouter">
            </form>
        </div>
    </div>
</div>

