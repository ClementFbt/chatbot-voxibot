<?php
// Connexion et s�lection de la base
$link = mysql_connect('localhost', 'root', '')
    or die('Impossible de se connecter : ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('voxibot') or die('Impossible de s�lectionner la base de donn�es');

// Ex�cution des requ�tes SQL
$query = 'SELECT * FROM users';
$result = mysql_query($query) or die('�chec de la requ�te : ' . mysql_error());

// Affichage des r�sultats en HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Lib�ration des r�sultats
mysql_free_result($result);

// Fermeture de la connexion
mysql_close($link);
?>