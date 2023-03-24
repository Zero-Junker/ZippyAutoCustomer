<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</html>
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "ZippyAuto";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE Types (
    type_id  NOT NULL,
    modelType NOT NULL
)";
$sql = "INSERT INTO Types (type_id,modelType)
VALUES (1,'SUV')";
$sql .= "INSERT INTO Types (type_id,modelType)
VALUES (2,'Truck')";
$sql .= "INSERT INTO Types (type_id,modelType)
VALUES (3,'Sedan')";
$sql .= "INSERT INTO Types (type_id,modelType)
VALUES (4,'Coupe')";

//print table
$sql = "SELECT type_id,modelType FROM Types ORDER BY type_id DEC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row =  $result->fetch_assoc()) {
        echo 
            "<div class='trow'>" . 
            $row["type_id"]. " " . 
            $row["modelType"] . " " .
            "<span class='delete'>
            <form action='delete.php' method='POST'>
                <button type='submit'>Delete</button>
            </form>
            </span>" . " " .  
            "<span><a href='delete.php?type_id=".$row['type_id']."'>Delete</a></span>" . 
            "<span class='editMember'><a href='#'>Edit</a></span>" . 
            "<br></div>";
    }
} else {
  echo "0 results";
}
$conn->close();
?>
<html>
    <body>
        <form action="index.php" method="post">
            Type ID: <input type="number" name="type_id"><br>
            Model Type: <input type="text" name="modelType"><br>
            <input type="submit">
        </form>
        <a href="index.php">return</a>
    </body>
</html>
<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "ZippyAuto";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO Types (type_id,modelType)
    VALUES ($_POST["type_id"],$_POST["modelType"])";
    $conn->close();
?>