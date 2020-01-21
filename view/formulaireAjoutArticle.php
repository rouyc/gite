<!-- Formulaire d'ajout d'un article -->
<div class="col s12">
    <div class="card">
        <div class="card-content">

            <form action="../index.php?controller=blog&action=ajoutArticle" method="post" enctype="multipart/form-data">
                <legend>Article</legend>
                <p>
                    <label for="titre_id">Titre</label>
                    <input type="text" name="nomArticle" id="titre_id" required/>
                </p>
                <p>
                    <label for="description_id">Contenu</label>
                    <input type="text" name="contenuArticle" id="contenu_id" required/>
                </p>
                <label for="fileUpload">Fichier:</label>
                <input type="file" name="photo" id="fileUpload">

                <input type="submit" name="submit" value="Upload">
                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>

            </form>
        </div>
    </div>
</div>