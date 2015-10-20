<html>
<head>
  <link rel='stylesheet' type='text/css' href='../main.css' />

<title>Kudos</title>
<style media="screen">
  input {
      display: inline-block;
      margin: 10px;
  }

  h1 {
    text-align: center;
    color: white;
    font-size: 4em;
    margin-top: 5%;
  }

  textarea {
    margin-top: 10px;
  }

</style>
</head>
<body>
  <h1>Support Shout Out</h1>

<form id="kudos-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" required name="name" placeholder="Your Name"><br>
    <textarea name="message" placeholder="Shout Out" rows="4" cols="50" maxlength="43"></textarea><br>
    <input type="submit" value="submit">
</form>

<?php
$name = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = kudos_inputs($_POST["name"]);
   $message = kudos_inputs($_POST["message"]);
}

function kudos_inputs($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(isset($_POST["name"])){
$mysql_host='';
$mysql_user='';
$mysql_password='';

try {
$conn = new PDO("mysql:host=$mysql_host;dbname=##DBNAME##",$mysql_user,$mysql_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("INSERT INTO messages (message, submitter)
VALUES (:message, :name)");
$stmt ->bindParam(':message', $message);
$stmt ->bindParam(':name', $name);
$stmt->execute();

header("Location: http://message.hostzi.com/thankyou");
}

catch(PDOException $e)
{
echo $e->getMessage();
}
$conn = null;
}
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
