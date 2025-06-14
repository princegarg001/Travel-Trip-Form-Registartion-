<?php
$insert  =false;
if(isset($_POST['Name'])){
$server = "localhost";
$username = "root";
$password = "myrootpassword"; // or "" if no password
$database = "trip_register"; // replace with your DB name

$port = 3307;
$con = mysqli_connect($server, $username, $password, $database, $port);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Success connection<br>";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Safely get form values
    $Name = $_POST['Name'] ?? '';
    $age = $_POST['age'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $Desc = $_POST['other_info'] ?? '';

    // Sanitize inputs
    $Name = mysqli_real_escape_string($con, $Name);
    $age = mysqli_real_escape_string($con, $age);
    $gender = mysqli_real_escape_string($con, $gender);
    $email = mysqli_real_escape_string($con, $email);
    $phone = mysqli_real_escape_string($con, $phone);
    $Desc = mysqli_real_escape_string($con, $Desc);

    // SQL query with proper quotes
    $sql = "INSERT INTO travel_registertation 
    (Name, age, gender, email, phone, other_info, dt) 
    VALUES ('$Name', '$age', '$gender', '$email', '$phone', '$Desc', current_timestamp())";

    // Execute query
    if (mysqli_query($con, $sql)) {
        $insert = true;
       // echo "Form submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Welcome to Travel Dunia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class = "bg"src="bg.jpeg" alt="Collage Trip">
    <div class = "container" >
<h1> Welcome To Travel Form</h1>
<p>Enter Details to Register For the Trip</p>
<?php
if($insert== true){
echo "<p class ='submitMsg'> Thanks for submitting Your response </p>";}
?>
<form action="index.php" method="post">
<input type="text" name="Name" id="name" placeholder="Enter your name">
<input type="text" name="age" id="age" placeholder="Enter your age">
<input type="text" name="gender" id="Gender" placeholder="Enter your gender">
<input type="text" name="email" id="email" placeholder="Enter your email">
<input type="text" name="phone" id="Phone" placeholder="Enter your phone">
<textarea name="other_info" id="desc" cols="30" rows="10" placeholder="Enter any useful details"></textarea>
<button class="btn">Submit</button>
</form>


</div>
<script src = index.js></script>
</body>
</html>

