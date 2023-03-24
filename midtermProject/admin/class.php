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
$sql = "CREATE TABLE Class (
    class_id  NOT NULL,
    class NOT NULL
)";
$sql = "INSERT INTO Class (class_id,class)
VALUES (1,'Utility')";
$sql .= "INSERT INTO Class (class_id,class)
VALUES (2,'Economy')";
$sql .= "INSERT INTO Class (class_id,class)
VALUES (3,'Luxury')";
$sql .= "INSERT INTO Class (class_id,class)
VALUES (4,'Sport')";
$conn->close();

//print table
$sql = "SELECT class_id,class FROM Class ORDER BY class_id DEC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row =  $result->fetch_assoc()) {
        echo 
            "<div class='trow'>" . 
            $row["class_id"]. " " . 
            $row["class"] . " " . 
            "<span class='delete'>
            <form action='delete.php' method='POST'>
                <button type='submit'>Delete</button>
            </form>
            </span>" . " " .  
            "<span><a href='delete.php?class_id=".$row['class_id']."'>Delete</a></span>" . 
            "<span class='editMember'><a href='#'>Edit</a></span>" . 
            "<br></div>";
    }
} else {
  echo "0 results";
}
?>
<html>
    <body>
    <form action="index.php" method="post">
            Class ID: <input type="number" name="class_id"><br>
            Class: <input type="text" name="class"><br>
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
    $sql = "INSERT INTO class (class_id,class)
    VALUES ($_POST["class_id"],$_POST["class"])";
    $conn->close();
?>