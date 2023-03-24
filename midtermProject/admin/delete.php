
<?php

// delete a record from table 1
$sql = "DELETE FROM Vehicles WHERE model='".$_GET['model']."' ";

if ($conn->query($sql) === TRUE) {
   header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
// delete a record from table 2
$sql = "DELETE FROM Types WHERE type_id='".$_GET['type_id']."' ";

if ($conn->query($sql) === TRUE) {
   header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
// delete a record from table 3
$sql = "DELETE FROM Class WHERE class_id='".$_GET['class_id']."' ";

if ($conn->query($sql) === TRUE) {
   header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
// delete a record from table 4
$sql = "DELETE FROM Make WHERE make_id='".$_GET['make_id']."' ";

if ($conn->query($sql) === TRUE) {
   header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>