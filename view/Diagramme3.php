

<?php
echo $anneeC;

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
        $mois = date_format($date,'m');
        $annee = date_format($date,'Y');
        if ($anneeC == $annee){
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
print " data: [$mois_A_precedent,0]";
print "}";
print" ]";
print "},";
print " options: {";
print " legend: { display: false },";
print "title: {";
print "display: true,";
print "text: '".$t."'";
print "}";
print "}";
print " });";
print "</script>";
?>