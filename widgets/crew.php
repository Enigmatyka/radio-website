<?php

include '../modules/simple_html_dom.php';
header("Content-Type: application/json; charset=UTF-8");

$url = "https://radiornr.panelradiowy.pl/embed.php?script=ekipa";

$document = new simple_html_dom();
$document->load_file($url);

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

echo json_encode($outTable);
?>