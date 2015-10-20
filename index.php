<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' type='text/css' href='main.css' />
  <link rel="icon" href="favicon.png" type="image/x-icon"/>
  <script src="../js/colorChange.js"></script>

</head>
<body id="content">
  <?php
  echo "<table style='display: block;'>";

  class TableRows extends RecursiveIteratorIterator {
       function __construct($it) {
           parent::__construct($it, self::LEAVES_ONLY);
       }

       function current() {
           return "<td>" . parent::current(). "</td>";
       }

       function beginChildren() {
           echo "<tr>";
       }

       function endChildren() {
           echo "</tr>" . "\n";
       }
  }

  $mysql_host = '';
  $mysql_user='';
  $mysql_password='';
  $dbname = '';

  try {
     $conn = new PDO("mysql:host=$mysql_host;dbname=$dbname", $mysql_user, $mysql_password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT message, submitter FROM messages ORDER BY RAND() LIMIT 2");
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
}
}
catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

      </body>
      </html>
