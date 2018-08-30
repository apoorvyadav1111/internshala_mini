<?php
session_start();
global $mysqli;

$mysqli = mysqli_connect("localhost", "root", "", "internshala");
//check connection
if (mysqli_connect_errno()) {
    printf("Connect failed %s\n", mysqli_connect_error());
    exit();}
else {
    printf("host information: %s\n", mysqli_get_host_info($mysqli));
}

if (($_POST['fname']=='')||($_POST['lname']=='')) {
    header('location:sign.php');


}

$fname       = mysqli_real_escape_string($mysqli,$_POST['fname']);
$lname       = mysqli_real_escape_string($mysqli,$_POST['lname']);
$email      = mysqli_real_escape_string($mysqli,$_POST['email']);
$pass  = mysqli_real_escape_string($mysqli,$_POST['pkey']);
//checking user is not already registered
$query = "SELECT email FROM students where email='".$email."'";
$result=mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));
$numResults=mysqli_num_rows($result);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
{
    $message =  "Invalid email address please type a valid email!!";
    echo $message;
}
elseif($numResults>=1)
{
    $message = " Email already exist!!";
    echo $message;
}
else{



    global $u_id;
   $u_id = mysqli_insert_id($mysqli);
    $query="INSERT into students (idstu, fname,lname, email, pass) VALUES('".$u_id."','".$fname."','".$lname."','".$email."','".$pass."')";
$result=mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));}
echo "<h1>user inserted in the database</h1> ";
mysqli_close($mysqli);
$_SESSION['email']=$email;
$_SESSION['idstu']=$u_id;
$_SESSION['fname']=$fname;
header('location:index.php');
?>
