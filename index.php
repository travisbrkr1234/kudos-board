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

  $query = "SELECT * FROM messages ORDER BY RAND() LIMIT 4";

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
        echo $row['message'] . "\n";
        echo "</td></tr>";
        echo "<tr><td>";
          echo " -" . $row['submitter'] . "\n";
          echo "</td></tr>";
        }
        echo "</table>";

        mysql_close();

        ?>
        <script charset="utf-8">
        //colorChange start
        var bg = "#";
        var options = ['125079',  '51A3DC',  '79BE37',  'A05D8E',  '646771']

        for (var i = 0 ; i < 1 ; i++) {
          bg += options[Math.floor(Math.random()*5)];
        }
        document.getElementsByTagName('body')[0].style.background = bg;

        </script>
      </body>
      </html>
