<!-- Menu -->



<div class="center" id="menu">
    <nav class="nav-wrapper white">
        <div class="col s12" >
            <ul class="left">
                <li><a class="waves-effect waves-light btn indigo lighten-5" style="color:black;" href="./index.php?controller=admin&action=build_statistique">Vue d'ensemble</a></li>

               <li>

                <!-- Dropdown Trigger -->
                <a class='waves-effect waves-light dropdown-trigger btn indigo lighten-5' style="color:black;" href='#' data-target='dropdown1'>Réservations/Année</a>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content indigo lighten-5'>
                    <li><a href="./index.php?controller=admin&action=build_statistique2&Annee=<?php echo date('Y')-1; ?>"><?php echo  date('Y')-1; ?></a></li>
                    <li><a href="./index.php?controller=admin&action=build_statistique2&Annee=<?php echo date('Y'); ?>"><?php echo  date('Y'); ?></a></li>
                    <li><a href="./index.php?controller=admin&action=build_statistique2&Annee=<?php echo date('Y')+1; ?>"><?php echo  date('Y')+1; ?></a></li>

                </ul>
                    <script>
                        $('.dropdown-trigger').dropdown();
                    </script>
                </li>

                <li>

                    <!-- Dropdown Trigger -->
                    <a class='waves-effect waves-light dropdown-trigger btn indigo lighten-5' style="color:black;" href='#' data-target='dropdown2'>Argent/année</a>

                    <!-- Dropdown Structure -->
                    <ul id='dropdown2' class='dropdown-content indigo lighten-5'>
                        <li><a href="./index.php?controller=admin&action=build_statistiqueT&Annee=<?php echo date('Y')-1; ?>"><?php echo  date('Y')-1; ?></a></li>
                        <li><a href="./index.php?controller=admin&action=build_statistiqueT&Annee=<?php echo date('Y'); ?>"><?php echo  date('Y'); ?></a></li>
                        <li><a href="./index.php?controller=admin&action=build_statistiqueT&Annee=<?php echo date('Y')+1; ?>"><?php echo  date('Y')+1; ?></a></li>

                    </ul>
                    <script>
                        $('.dropdown-trigger').dropdown();
                    </script>
                </li>

            </ul>
        </div>
    </nav>
</div><?php
