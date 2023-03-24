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
$sql = "CREATE TABLE Make (
    make_id  NOT NULL,
    make NOT NULL
)";
$sql = "INSERT INTO Make (make_id,make)
VALUES (1,'Chevy')";
$sql .= "INSERT INTO Make (make_id,make)
VALUES (2,'Ford')";
$sql .= "INSERT INTO Make (make_id,make)
VALUES (3,'Cadillac')";
$sql .= "INSERT INTO Make (make_id,make)
VALUES (4,'Nissan')";
$sql .= "INSERT INTO Make (make_id,make)
VALUES (5,'Hyundai')";
$sql .= "INSERT INTO Make (make_id,make)
VALUES (6,'Dodge')";
$sql .= "INSERT INTO Make (make_id,make)
VALUES (7,'Buick')";

//print table
$sql = "SELECT make_id,make FROM Make ORDER BY make_id DEC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row =  $result->fetch_assoc()) {
        echo 
            "<div class='trow'>" . 
            $row["make_id"]. " " . 
            $row["make"] . " " . 
            "<span class='delete'>
            <form action='delete.php' method='POST'>
                <button type='submit'>Delete</button>
            </form>
            </span>" . " " .  
            "<span><a href='delete.php?make_id=".$row['make_id']."'>Delete</a></span>" . 
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
            Make ID: <input type="number" name="make_id"><br>
            Make: <input type="text" name="make"><br>
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
    $sql = "INSERT INTO Make (make_id,make)
    VALUES ($_POST["make_id"],$_POST["make"])";
    $conn->close();
?>