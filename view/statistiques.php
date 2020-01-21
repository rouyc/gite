<?php
$tabNomChambre = array();
$tabNbRes = array();
foreach ($tab_page as $page) {
    $tabNomChambre[] = $page->getNomChambre();
    $tabNbRes[] = ModelChambre::getNombreReservation($page->getIdChambre());
}
$nomChambre = join("\",\"",$tabNomChambre);
$nbRes = join(",",$tabNbRes);
?>


<canvas id="bar-chart" width="800" height="450"></canvas>
<?php
print "<script>";
    print "Chart.defaults.global.title.display = true;";
     "Chart.defaults.global.title.text = \"titre de base\";";
print "</script>";


print "<script>";
    print "new Chart(document.getElementById(\"bar-chart\"), {";
        print "type: 'bar',";
        print "data: {";

            print "labels: [\"$nomChambre\",\" \"],";
            print "datasets: [{";
                print "label: \"Nombre de réservations\",";
                print "backgroundColor: [\"#3e95cd\", \"#8e5ea2\",\"#3cba9f\",\"#e8c3b9\",\"#c45850\"],";
               print " data: [$nbRes, 0]";
            print "}";
           print" ]";
        print "},";
           print " options: {";
                print "ticks: {beginAtZero: true},";
               print " legend: { display: false },";
                print "title: {";
                    print "display: true,";
                    print "text: 'Nombre de reservations par chambre'";
                print "}";
            print "}";
   print " });";
print "</script>";
?>

<?php
    $res = TRUE;
    $tab_mois = array(
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0,
        6 => 0,
        7 => 0,
        8 => 0,
        9 => 0,
        10 => 0,
        11 => 0,
        12 => 0);
    foreach ($tab_reservation_valide as $reservation) {
        $dateDebut = new DateTime($reservation->getDateDebut());
        $dateFin = new DateTime($reservation->getDateFin());
        $date = $dateDebut;
        while($date<=$dateFin){
            $mois = date_format($date,'m');
            if ($mois<10) {
                $mois = str_replace("0","",$mois);
            }
            $tab_mois[$mois] = $tab_mois[$mois] + 1;
            $date->modify('+1 day');
        }
    }
    $month = join(",",$tab_mois);

?>

<canvas id="bar-chart2" width="800" height="450"></canvas>
<?php

print "<script>";
    print "new Chart(document.getElementById(\"bar-chart2\"), {";
        print "type: 'bar',";
        print "data: {";

            print "labels: [\"Janvier\",\"Février\",\"Mars\",\"Avril\",\"Mai\",\"Juin\",\"Juillet\",\"Août\",\"Septembre\",\"Octobre\",\"Novembre\",\"Décembre\",\" \"],";
            print "datasets: [{";
            print "label: \"Nombre de jours reservés\",";
            print "backgroundColor: [\"#3e95cd\", \"#8e5ea2\",\"#3cba9f\",\"#e8c3b9\",\"#c45850\",\"#3e95cd\", \"#8e5ea2\",\"#3cba9f\",\"#e8c3b9\",\"#c45850\",\"#3e95cd\",\"#8e5ea2\",\"#8e5ea2\"],";
            print " data: [$month,0]";
            print "}";
            print" ]";
            print "},";
        print " options: {";
            print " legend: { display: false },";
            print "title: {";
            print "display: true,";
            print "text: 'Jours réservés par mois depuis la création'";
            print "}";
        print "}";
    print " });";
print "</script>";
?>

<?php
$tab_mois_precedent = array(
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
    8 => 0,
    9 => 0,
    10 => 0,
    11 => 0,
    12 => 0);
foreach ($tab_reservation_valide as $reservation) {
    $dateDebut = new DateTime($reservation->getDateDebut());
    $dateFin = new DateTime($reservation->getDateFin());
    $date = $dateDebut;
    while($date<=$dateFin){
        $anneePrecedente = date('Y')-1;
        $mois = date_format($date,'m');
        $annee = date_format($date,'Y');
        if ($anneePrecedente == $annee){
            if ($mois<10) {
                $mois = str_replace("0","",$mois);
            }
            $tab_mois_precedent[$mois] = $tab_mois_precedent[$mois] + 1;
            $date->modify('+1 day');
        }
        else{
            $date->modify('+1 day');
        }

    }
}
$mois_A_precedent = join(",",$tab_mois_precedent);
echo "$mois_A_precedent";

?>
<canvas id="bar-chart3" width="800" height="450"></canvas>
<?php

    print "<script>";
        print "new Chart(document.getElementById(\"bar-chart3\"), {";
        print "type: 'bar',";
            print "data: {";

                print "labels: [\"Janvier\",\"Février\",\"Mars\",\"Avril\",\"Mai\",\"Juin\",\"Juillet\",\"Août\",\"Septembre\",\"Octobre\",\"Novembre\",\"Décembre\",\" \"],";
                print "datasets: [{";
                print "label: \"Nombre de jours reservés\",";
                print "backgroundColor: [\"#3e95cd\", \"#8e5ea2\",\"#3cba9f\",\"#e8c3b9\",\"#c45850\",\"#3e95cd\", \"#8e5ea2\",\"#3cba9f\",\"#e8c3b9\",\"#c45850\",\"#3e95cd\",\"#8e5ea2\",\"#8e5ea2\"],";
                print " data: [0,1,2,1,54,65,0,0,0,0,0,0]";
                print "}";
                print" ]";
                print "},";
            print " options: {";
                print " legend: { display: false },";
                print "title: {";
                print "display: true,";
                print "text: 'Jours réservés par mois pour l'année 1995";
                print "}";
            print "}";
        print " });";
    print "</script>";
?>
