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

  //echo 'Success: A proper connection to MySQL was made.';
  //echo '<br>';
  //echo 'Host information: '.$mysqli->host_info;
  //echo '<br>';
  //echo 'Protocol version: '.$mysqli->protocol_version;

  $sql = "SELECT * FROM customers";
  $result = $mysqli->query($sql);
  
  $output = $result->num_rows;
  
  $mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Testing PHP & MySQL</title>
</head>
<body>
<h1>Testing PHP & MySQL</h1>
<?php echo $output; ?>
</body>
</html>