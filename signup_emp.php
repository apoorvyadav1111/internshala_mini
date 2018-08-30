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

$fname       = mysqli_real_escape_string($mysqli,$_POST['fname']);
$ename       = mysqli_real_escape_string($mysqli,$_POST['ename']);
$lname       = mysqli_real_escape_string($mysqli,$_POST['lname']);
$mob=$_POST['mob'];
$email      = mysqli_real_escape_string($mysqli,$_POST['empmail']);
$pass  = mysqli_real_escape_string($mysqli,$_POST['pkey']);
//$password=password_hash($pass,PASSWORD_BCRYPT); for future scope

//checking user is not already registered
$query = "SELECT empmail FROM employer where empmail='".$email."'";
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
    $query="INSERT into employer (idemp, ename,mob, fname,lname, empmail, pass) VALUES('".$u_id."','".$ename."','".$mob."','".$fname."','".$lname."','".$email."','".$pass."')";
    $result=mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));}
echo "<h1>user inserted in the database</h1> ";
mysqli_close($mysqli);
$_SESSION['empmail']=$email;
$_SESSION['idemp']=$u_id;
$_SESSION['ename']=$ename;
header('location:empinternship.php');
?>
