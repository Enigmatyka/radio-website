<?php

include '../modules/simple_html_dom.php';
header("Content-Type: application/json; charset=UTF-8");

$url = "https://radiornr.panelradiowy.pl/embed.php?script=ramowka";
$document = new simple_html_dom();
$document->load_file($url);

$days = $document->find('.dzien');
$tables = $document->find('.ramka');

$outTable = array();

for ($i=0; $i<count($days); $i++){ 
    $dayName = $days[$i]->plaintext;
    $outTable[$dayName] = array();
    $dayEntries = $tables[$i]->children();

    if ($dayEntries[1]->find('center', 0) != null) {
        $outTable[$dayName]['noAudition'] = true;
    } else {
        $outTable[$dayName]['auditions'] = array();
        for ($j=1; $j<count($dayEntries); $j++) {
            $auditionName = $dayEntries[$j]->children(0)->plaintext;
            $presenterName = $dayEntries[$j]->children(1)->plaintext;
            $auditionHour = $dayEntries[$j]->children(2)->plaintext;
            array_push($outTable[$dayName]['auditions'], array('name' => $auditionName, 'presenter' => $presenterName, 'hours' => $auditionHour));
        }
    }
}

echo json_encode($outTable);

?>