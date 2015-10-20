<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' type='text/css' href='../main.css' />
  <link rel="icon" href="../favicon.png" type="image/x-icon"/>
  <script src="../js/colorChange.js"></script>
<style media="screen">
  form {
      display: block;
      text-align: center;
      margin-top: 10px;
      margin-right: auto;
      margin-left: auto;
  }

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
<title>Kudos</title>
</head>
<body>
  <h1>Support Shout Out</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" required name="name" placeholder="Your Name"><br>
    <textarea name="message" placeholder="Shout Out" rows="4" cols="50" maxlength="64"></textarea><br>
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
  $mysql_host = '';
  $mysql_user='';
  $mysql_password='';
  $dbname = '';

try {
$conn = new PDO("mysql:host=$mysql_host;dbname=$dbname",$mysql_user,$mysql_password);
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

</body>
</html>
