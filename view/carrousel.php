<!-- Carrousel -->
    <script>
        $(document).ready(function(){
            $('.carousel').carousel();
        });
    </script>

    <div class="carousel carousel-slider">
        <a class="carousel-item" href="#one!"> <?php
            echo "<img src=\"$image1\">";
            ?>
        </a>
        <a class="carousel-item" href="#two!"> <?php
            echo "<img src=\"$image2\">";
            ?>
        </a>
        <a class="carousel-item" href="#three!"> <?php
            echo "<img src=\"$image3\">";
            ?>
        </a>
    </div>