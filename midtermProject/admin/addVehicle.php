<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <form action="index.php" method="post">
            Year: <input type="number" name="years"><br>
            Model: <input type="text" name="model"><br>
            Price: <input type="number" name="price"><br>
            Type ID: <input type="number" name="type_id"><br>
            Class ID: <input type="number" name="class_id"><br>
            Make ID: <input type="number" name="make_id"><br>
            <input type="submit">
        </form>
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
    $sql = "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES ($_POST["years"],$_POST["model"],$_POST["price"],$_POST["type_id"],$_POST["class_id"],$_POST["make_id"])";
$conn->close();
?>
<html>
<body>
    <a href="index.php">return</a>
</body>
</html>