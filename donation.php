<?php
$servername = "localhost";
$username = "root";
$password = "SetRootPasswordHere";
$database = "school";
$con = new mysqli($servername, $username, $password, $database);

if($con->connect_error){
    die("Connection failed: " . $con->connect_error);
} else {
    echo "Connected successfully";
}


echo "hello";
$stmt = $con->prepare("INSERT INTO `Donation` (`FirstName`, `LastName`, `Email`, `Phone`, `Country`, `City`, `Address`, `Address2`, `State`, `PostalCode`, `DonationAmount`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
echo "hello";
// Bind the data to the placeholders
$stmt->bind_param("ssssssssssi", $field1, $field2, $field3, $field4, $field5, $field6, $field7, $field8, $field9, $field10,$field11);


$field1 = $_POST['FirstName'];
$field2 = $_POST['LastName'];
$field3 = $_POST['Email'];
$field4 = $_POST['Phone'];
$field5 = $_POST['Country'];
$field6 = $_POST['City'];
$field7 = $_POST['Address'];
echo "<br>".$_POST['Address2']."<br>";
if(isset($_POST['Address2'])){
    $field8 = $_POST['Address2'];
} else {
    $field8 = "";
};
$field9 = $_POST['State'];
$field10 =$_POST['PostalCode'];
$field11 =$_POST['DonationAmount'];

$result = $stmt->execute();


// $sql = "INSERT INTO `Donation` (`FirstName`, `LastName`, `Email`, `Phone`, `Country`, `City`, `Address`, `Address2`, `State`, `PostalCode`, `DonationAmount`) VALUES ($field1`, `$field2`, `$field3`, `$field4`, `$field5`, `$field6`, `$field7`, `$field8`, `$field9`, `$field10`,`$field11`);";


// $stmt->close();

// Set the values of the variables that were bound to the placeholders

// Execute the prepared statement
if($result){
    // echo "Your donation has been recorded";
    // header('HTTP/1.0 201 Created'); 
    header('Location: successfull.html');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close the statement
// $stmt->close();
// echo "$sql";
// if($con->query($stmt)===TRUE){
//     echo "Your donation has been recorded";
//     header('HTTP/1.0 201 Created'); 
//     header('Location: index.html');
// } else {
//     echo "Error: " . $sql . "<br>" . $con->error;
// }
?>