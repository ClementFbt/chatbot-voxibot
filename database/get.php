<?php
// Connexion et s�lection de la base
$link = mysql_connect('localhost', 'root', '')
    or die('Impossible de se connecter : ' . mysql_error());
mysql_select_db('voxibot') or die('Impossible de s�lectionner la base de donn�es');

if (isset($_REQUEST['phone']))
$query = 'SELECT * FROM users WHERE userPhone = '.$_REQUEST['phone'];
else
if (isset($_REQUEST['id']))
$query = 'SELECT * FROM users WHERE userId = \''.$_REQUEST['id'].'\'';
else
$query = 'SELECT * FROM users';

$result = mysql_query($query) or die('�chec de la requ�te : ' . mysql_error());

// Affichage des r�sultats en HTML
if (false)
{
  echo "<table>\n";
  while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
      echo "\t<tr>\n";
      foreach ($line as $col_value) {
          echo "\t\t<td>$col_value</td>\n";
      }
      echo "\t</tr>\n";
  }
  echo "</table>\n";
}
else
{
  /*
  $count = mysql_num_fields($result);
  while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
      $parameters[] = $line;
  }
  */

  $parameters = mysql_fetch_array($result, MYSQL_ASSOC);

  echo json_encode($parameters);
}

// Lib�ration des r�sultats
mysql_free_result($result);

// Fermeture de la connexion
mysql_close($link);
?>