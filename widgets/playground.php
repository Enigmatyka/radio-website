<?php
include '../modules/widgets.php';
$baseUrl = "https://radiornr.panelradiowy.pl";
$crewData = json_decode(getCrewData(), true);

function buildCrewTable() {
    foreach ($crewData as $crewMember => $memberInfo) {
        echo '<div class="crew-member">' . "\n";
        echo '<span class="crew-member-name">' . $crewMember . '</span>' . "\n";
        echo '<table class="crew-member-table">' . "\n";
        echo '<tr><td class="image header">Zdjęcie:</td>' . "\n" . '<td class="header">Dane:</td></tr>' . "\n";
        echo '<tr>' . "\n";
        $avatarUrl = $baseUrl . $memberInfo['avatarURL'];
        echo '<td class="image field"> <img class="avatar" src="' . $avatarUrl . '"></td>' . "\n";
        echo '<td class="field">' . "\n";
        $filteredData = array_filter($memberInfo);
        echo '<span class="crew-member-data">' . "\n";


        foreach ($filteredData as $key => $value) {
            if ($key == 'avatarURL') {
                echo '';      
            } else {
                echo $key . ": " . $value . '<br><hr>';
            }
        }
        echo '</span>' . "\n";
        echo '</td>' . "\n" . '</tr>' . "\n";
        echo '</table>' . "\n" . '</div>' . "\n";
    }
}
?>

<!doctype html>

<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

</head>

<body>
<?php
foreach ($crewData as $crewMember => $memberInfo) {
    echo '<div class="crew-member">' . "\n";
    echo '<span class="crew-member-name">' . $crewMember . '</span>' . "\n";
    echo '<table class="crew-member-table">' . "\n";
    echo '<tr><td class="image-header" width=126>Zdjęcie:</td>' . "\n" . '<td class="header">Dane:</td></tr>' . "\n";
    echo '<tr>' . "\n";
    $avatarUrl = $baseUrl . $memberInfo['avatarURL'];
    echo '<td class="image-field"> <img class="avatar" src="' . $avatarUrl . '"></td>' . "\n";
    echo '<td class="field">' . "\n";
    $filteredData = array_filter($memberInfo);
    echo '<span class="crew-member-data">' . "\n";


    foreach ($filteredData as $key => $value) {
        if ($key == 'avatarURL') {
            echo '';      
        } else {
            echo $key . ": " . $value . '<br>';
        }
    }
    echo '</span>' . "\n";
    echo '</td>' . "\n" . '</tr>' . "\n";
    echo '</table>' . "\n" . '</div>' . "\n";
}
?>
</body>

