<?php
include "../globalconfig.php";


$pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
$pdo->exec("set names utf8");

//$sqlprojekte = "SELECT * FROM " . $db_pref . "_projekte WHERE id=" . $_GET['projectid'] . " LIMIT 1";

// ALT:
// $sqlabfrage = 'select ID, username, mail, nameclear from '.$db_pref.'_users where nameclear like \'%'.$_GET['s'].'%\' or username like  \'%'.$_GET['s'].'%\' LIMIT 25';

// Neu:
$sqlabfrage = $pdo->prepare('select ID, username, mail, nameclear from ' . $db_pref . '_users where nameclear like :eingabe or username like :eingabe LIMIT 25');
if (!empty($_GET['s'])) {
    $str = "%" . $_GET['s'] . "%";
} else {
    $str = "%";
}

$sqlabfrage->bindParam(':eingabe', $str);
$sqlabfrage->execute();

$ergebnis = $sqlabfrage->fetchAll();

echo '<table id="datatable-buttons" class="display table table-striped table-bordered" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Benutzername</th>
                    <th>Email-Adresse</th>
                    <th>Auswahl</th>
                    </tr>
                </thead>
                <tbody>';

foreach ($ergebnis as $row) {
    echo "<tr>\n<td>";
    echo $row['username'];
    echo " (";
    echo $row['nameclear'];
    echo ")";
    echo "</td>\n<td>";
    echo $row['mail'];
    echo "</td>\n<td><a href='javascript:waehlebenutzer(";
    echo $row['ID'];
    echo ",\"";
    echo $row['username'];
    echo "\")' class = \"btn btn-success\">auswählen</a>";
    echo "</td>\n</tr>";
}
echo '</tbody></table>';

?>