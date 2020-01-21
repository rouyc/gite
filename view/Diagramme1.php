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




