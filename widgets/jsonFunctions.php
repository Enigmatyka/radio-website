<?php


function getScheduleAsJSON($url) { // function unfinished, only gets first audition on a day
    $document = new simple_html_dom();
    $document->load_file($url);


    $days = $document->find('.dzien');
    $tables = $document->find('.ramka');

    $outTable = array();

    for ($i=0; $i<count($days); $i++){ 
        $outTable[$days[$i]->plaintext] = array();

        if (count($dayAuditionInfo) == 1) {
            $outTable[$days[$i]->plaintext]["noAudition"] = true;
        } else {
            $outTable[$days[$i]->plaintext]["audition"] = $dayAuditionInfo[0]->plaintext;
            $outTable[$days[$i]->plaintext]["presenter"] = $dayAuditionInfo[1]->plaintext;
            $outTable[$days[$i]->plaintext]["auditionHours"] = $dayAuditionInfo[2]->plaintext;
        }
    }
    return json_encode($outTable);
}

function getCrewAsJSON($url) {
    $document = new simple_html_dom();
    $document->load_file($url);

    $names = $document->find('.napis');
    $tables = $document->find('.ramka');
    $avatars = $document->find('.awatar');

    $outTable = array();

    for ($i=0; $i<count($names); $i++){
        
        $dataRows = preg_split("/\n/", $tables[$i]->children(1)->plaintext);
        $outTable[$names[$i]->plaintext] = array();
        $outTable[$names[$i]->plaintext]["avatarURL"] = $avatars[$i]->src;
        
        foreach ($dataRows as $row) {
            $presentersData = preg_split("/:/", $row);
            $outTable[$names[$i]->plaintext][ltrim($presentersData[0])] = ltrim(preg_replace("/\r/", "", $presentersData[1]));
        }
    }

    json_encode($outTable);
}

?>