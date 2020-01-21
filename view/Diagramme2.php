<div>
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
</div>
