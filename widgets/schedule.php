<?php

include '../modules/simple_html_dom.php';
header("Content-Type: text/plain; charset=UTF-8");


$url = "https://radiornr.panelradiowy.pl/embed.php?script=ramowka";


$document = new simple_html_dom();
$document->load_file($url);


$days = $document->find('.szerokosc');

echo $days[0]->innertext;

?>