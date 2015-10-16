<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' type='text/css' href='main.css' />
</head>
<body id="content">
  <?php

  $mysql_host = "";
  $mysql_user = "";
  $mysql_password = "";
  $mysql_db = "";

  $newConnection = mysql_connect($mysql_host, $mysql_user, $mysql_password);

  if (!$newConnection) {
    echo "Could not connect to server\n";
    trigger_error(mysql_error(), E_USER_ERROR);
  } else {

  }

  $newConnection2 = mysql_select_db($mysql_db);

  if (!$newConnection2) {
    echo "Cannot select database\n";
    trigger_error(mysql_error(), E_USER_ERROR);
  } else {

  }

  $query = "SELECT * FROM kudos_message LIMIT 4";

  $newConnections = mysql_query($query);

  if (!$newConnections) {
    echo "Could not execute query: $query";
    trigger_error(mysql_error(), E_USER_ERROR);
  } else {
    $query;
  }

  echo "<table>\n";

  while ($row = mysql_fetch_assoc($newConnections)) {
    echo "<tr><td>";
    echo $row['Message'] . "\n";
    echo "</td></tr>";
    echo "<tr><td>";
    echo " -" . $row['Submitter'] . "\n";
    echo "</td></tr>";
  }
  echo "</table>";

  mysql_close();

  ?>

</body>
</html>
