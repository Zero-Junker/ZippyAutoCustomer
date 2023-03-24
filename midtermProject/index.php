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
//table 1
$sql = "CREATE TABLE Vehicles (
    years NOT NULL,
    model VARCHAR(30) NOT NULL,
    price NOT NULL,
    type_id  NOT NULL,
    class_id NOT NULL,
    make_id NOT NULL
    FOREIGN KEY (type_id) REFERENCES Types (type_id)
    FOREIGN KEY (class_id) REFERENCES Class (class_id)
    FOREIGN KEY (make_id) REFERENCES Make (make_id)
)PRIMARY KEY(model)";
$sql = "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2009,'Suburban',18999,1,1,1)";
$sql .= "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2011,'F150',22999,2,1,2)";
$sql .= "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2012,'Escalade',24999,1,3,3)";
$sql .= "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2018,'Rogue',34999,1,2,4)";
$sql .= "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2016,'Sonata',29999,3,2,5)";
$sql .= "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2016,'Challenger',49999,4,4,6)";
$sql .= "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2015,'Tahoe',26999,1,1,1)";
$sql .= "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2017,'QX80',54999,1,3,7)";
$sql .= "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2015,'Fusion',19999,3,2,2)";
$sql .= "INSERT INTO Vehicles (years,model,price,type_id,class_id,make_id)
VALUES (2014,'XTS',19999,3,3,3)";

//table 2
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

//Table 3
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

//Table 4
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

//Print table 1
$sql = "SELECT years,model,price,type_id,class_id,make_id FROM Vehicles ORDER BY price DEC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row =  $result->fetch_assoc()) {
        echo 
            "<div class='trow'>" . 
            $row["years"]. " " . 
            $row["model"] . " " . 
            $row["price"]. " " . 
            $row["type_id"]. " " . 
            $row["class_id"]. " " . 
            $row["make_id"]. " " . 
            "<br></div>";
    }
} else {
  echo "0 results";
}
$conn->close();
?>