<?php
include 'simple_html_dom.php';

function getScheduleData() {
    $document = new simple_html_dom();
    $document->load_file("https://radiornr.panelradiowy.pl/embed.php?script=ramowka");

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

    return json_encode($outTable);
}

// <iframe src="https://radiornr.panelradiowy.pl/embed.php?script=utwor" scrolling="no" border="0" marginwidth="0" marginheight="0" frameborder="no" width="300" height="220"></iframe>

function getCrewData() {
    $document = new simple_html_dom();
    $document->load_file("https://radiornr.panelradiowy.pl/embed.php?script=ekipa");

    $names = $document->find('.napis');
    $tables = $document->find('.ramka');
    $avatars = $document->find('.awatar');

    $outTable = array();

    for ($i=0; $i<count($names); $i++){

        $dataRows = preg_split("/\n/", $tables[$i]->children(1)->plaintext);
        $outTable[$names[$i]->plaintext] = array();
        $avatarUrlToInsert = $avatars[$i]->src;
        
        if ($avatarUrlToInsert[0] != "/")
            $avatarUrlToInsert = "/" . $avatarUrlToInsert;

        $outTable[$names[$i]->plaintext]["avatarURL"] = $avatarUrlToInsert;

        foreach ($dataRows as $row) {
            $presentersData = preg_split("/:/", $row);
            $outTable[$names[$i]->plaintext][ltrim($presentersData[0])] = ltrim(preg_replace("/\r/", "", $presentersData[1]));
        }
    }

    return json_encode($outTable);
}

function getGreetings() {

    return 'xD';

}

?>