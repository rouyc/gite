<!-- Formulaire d'ajout d'une chambre -->
<div class="col s12">
    <div class="card">
        <div class="card-content">
            <form action="../index.php?controller=admin&action=addChambre" method="post" enctype="multipart/form-data">
                <legend>Chambre :</legend>
                <p>
                    <label for="chambre_id">Nom</label>
                    <input type="text" name="nom" id="chambre_id" required/>
                </p>
                <p>
                    <label for="description_id">Description</label>
                    <input type="text" name="description" id="description_id" required/>
                </p>

                <label for="fileUpload">Fichier:</label>
                <input type="file" name="photo" id="fileUpload">

                <input type="submit" name="submit" value="Upload">
                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
            </form>
        </div>
    </div>
</div>