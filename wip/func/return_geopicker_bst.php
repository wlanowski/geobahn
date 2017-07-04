<?php
include "../globalconfig.php";


$pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
$pdo->exec("set names utf8");

//$sqlprojekte = "SELECT * FROM " . $db_pref . "_projekte WHERE id=" . $_GET['projectid'] . " LIMIT 1";
if (isset($_GET['s'])) {
    $sqlabfrage = 'SELECT bezeichnung, kuerzel, geogr_breite, geogr_laenge from ' . $db_pref . '_bst WHERE bezeichnung LIKE "%' . $_GET['s'] . '%" LIMIT 100;';
}
if (isset($_GET['k'])) {
    $sqlabfrage = 'SELECT bezeichnung, kuerzel, geogr_breite, geogr_laenge from ' . $db_pref . '_bst WHERE kuerzel LIKE "' . $_GET['k'] . '" LIMIT 100;';
}
if (!isset($_GET['k']) && !isset($_GET['s'])) {
    return NULL;
}


echo '<table id="datatable-buttons" class="display table table-striped table-bordered" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>DS100</th>
                    <th>Ort</th>
                    <th>Auswahl</th>
                    </tr>
                </thead>
                <tbody>';

foreach ($pdo->query($sqlabfrage) as $row) {
    echo "<tr>\n<td>";
    echo $row['kuerzel'];
    echo "</td>\n<td>";
    echo $row['bezeichnung'];
    echo "</td>\n<td><a href='javascript:waehleort(";
    echo $row['geogr_breite'] . ',';
    echo $row['geogr_laenge'] . ")' class = \"btn btn-success\">auswählen</a>";
    echo "</td>\n</tr>";
}

echo '</tbody></table>';


?>