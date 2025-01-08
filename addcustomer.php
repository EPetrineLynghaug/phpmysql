<?php
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'testdb';
 
  $mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

//   echo 'Success: A proper connection to MySQL was made.';
//   echo '<br>';
//   echo 'Host information: '.$mysqli->host_info;
//   echo '<br>';
//   echo 'Protocol version: '.$mysqli->protocol_version;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// var_dump($_POST);
if ($_POST) {
    var_dump($_POST);

    $fn = $ln = $ad = $zi = $ci = ""; 
    // Initialize some badly named variables
    
    $fn = test_input($_POST["firstName"]); 
    $ln = test_input($_POST["lastName"]); 
    $ad = test_input($_POST["address"]); 
    $zi = test_input($_POST["zip"]); 
    $ci = test_input($_POST["city"]);

    $sql = "INSERT INTO customers (
        `LastName`, `FirstName`, `Adress`, `Zip`, `City`
    ) VALUES (
        '{$ln}', '{$fn}', '{$ad}', '{$zi}', '{$ci}'
    )";
    var_dump($sql);

    $result = $mysqli->query($sql);
    var_dump($result);
}
  $mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body>
    <h1>Add Customer</h1>
    <form method="post">
        <label for="firstName">First Name: </label><input id="firstName" name="firstName"><br>
        <label for="lastName">Last Name: </label><input id="lastName" name="lastName"><br>
        <label for="address">Address: </label><input id="adress" name="adress"><br>
        <label for="zip">Zip: </label><input id="zip" name="zip"><br>
        <label for="city">City: </label><input id="city" name="city"><br>
        <button id="submitbtn">Submit</button>
    </form>
    <p><a href="./index.php">Back</a></p>
</body>
</html>
