<?php
include '_utils.php';
include '_connection.php';


  $sql = "SELECT * FROM customers"; 
 
  // $sql = "SELECT * FROM customers WHERE CustomerId=5";//! kan søke etter en bruker fks.
  if (isset($_GET["q"])) {
    $q = test_input($_GET["q"]);
    $sql .= " WHERE FirstName LIKE '%{$q}%'";
    $sql .= " OR LastName LIKE '%{$q}%'";
    $sql .= " OR Adress LIKE '%{$q}%'";
    $sql .= " OR Zip LIKE '%{$q}%'";
    $sql .= " OR City LIKE '%{$q}%'";
  } 

  $result = $mysqli->query($sql);
  
  // var_dump($sql);
  
 
  //$output = $result->num_rows;
  $output = "";

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      // $output .= "<li>id: " . $row["CustomerId"]. " - Name: " . 
      // $row["FirstName"]. " " . $row["LastName"]. "</li>";
      $output .= "
        <li>
          Customer {$row["CustomerId"]}: 
          <strong>{$row["FirstName"]} {$row["LastName"]}</strong>, 
          {$row["Address"]}, 
          {$row["Zip"]} {$row["City"]}
          </li> 
          ";  
    }//! Som js måten men tar ikke høyde for null verdier. 
    // $output = "<ul>";
    // while($row = $result->fetch_assoc()) {
    //   $output .= "<li>id: " . $row["CustomerId"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. "</li>";
    // }
    $output .= "</ul>";
  } else {
    $output = "<p style='color: red'>0 results</p>";
  }
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
  <form>
    <label for="q"><input id="q" name="q" placeholder="Search">
    <button id="submitbtn">Submit</button>
  </form>

<?php echo $output; ?>
<p><a href ="./addcustomer.php">Add Customer</a></p>
</body>
</html>