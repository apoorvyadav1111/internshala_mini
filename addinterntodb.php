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

$type= mysqli_real_escape_string($mysqli,$_POST['type']);
$duration= mysqli_real_escape_string($mysqli,$_POST['duration']);
$stipend=$_POST['stipend'];
$jointype=$_POST['jointype'];
$startdate=$_POST['startdate'];
$applyby=$_POST['applyby'];
$description = $_POST['description'];
$perks=$_POST['perks'];
$req=$_POST['prere'];
$internshipid=mysqli_insert_id($mysqli);
$empid=$_SESSION['idemp'];
$empname=$_SESSION['ename'];
$query="INSERT into internships(internshipid,empid,type,empname,descrip,startdate,duration,stipend,jointype,applyby,posted,req,perks) VALUES('".$internshipid."','".$empid."','".$type."','".$empname."','".$description."','".$startdate."','".$duration."','".$stipend."','".$jointype."','".$applyby."',now(),'".$req."','".$perks."')";
$result=mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));
echo "<h1>Internship Posted Successfully</h1> ";
mysqli_close($mysqli);
header('location:empinternship.php');



?>
