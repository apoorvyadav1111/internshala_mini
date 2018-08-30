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


$whyhire = $_POST['hire'];
$previous=$_POST['work'];
$whenwill=$_POST['when'];
$appid=mysqli_insert_id($mysqli);
$interid=$_GET['id'];
$idstu=$_SESSION['idstu'];
$email=$_SESSION['email'];
$query="INSERT into applied(appid,idstu,email,interid,whyhire,previous,whenwill) VALUES('".$appid."','".$idstu."','".$email."','".$interid."','".$whyhire."','".$previous."','".$whenwill."')";
$result=mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));
echo "<h1>Internship Posted Successfully</h1> ";
mysqli_close($mysqli);
header('location:internships.php');



?>
