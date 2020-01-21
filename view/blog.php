<!-- Article -->
<div class="col s12">
    <div class="card">
        <div class="card-content">
                <?php
                    foreach ($tab_article as $article) {
                        echo '<div class="col s12">
                                <div class="card">
                                <script>
                                    $(document).ready(function(){
                                    $(\'.materialboxed\').materialbox();
                                  });
                                </script>
                                    <div class="card-content">'.'<img class="materialboxed" width="650" src="'.$article->getImage() . '">'. '<h5> '. $article->getTitreArticle() .'</h5> <br>'. $article->getContenuArticle() . '
                                    </div>
                                </div>
                            </div>';
                    }



                ?>

        </div>
    </div>
</div>