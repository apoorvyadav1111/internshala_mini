<?php
session_start();
global $mysqli;
$mysqli = mysqli_connect("localhost", "root", "gixxer150", "internshala");
//check connection
if (mysqli_connect_errno()) {
    printf("Connect failed %s\n", mysqli_connect_error());
    exit();}
else {
    printf("host information: %s\n", mysqli_get_host_info($mysqli));
}

$user     = mysqli_real_escape_string($mysqli,$_POST['user']);
$email      = mysqli_real_escape_string($mysqli,$_POST['email']);
$password   = mysqli_real_escape_string($mysqli,$_POST['pkey']);
if ($user=="student") {
    $qry="SELECT * FROM students WHERE email='" . $email . "' AND pass='" . $password . "'";
    $strSQL = mysqli_query($mysqli,$qry);
    $Results = mysqli_fetch_array($strSQL);
if(count($Results)>=1)
{
    $message = $Results['email']." Login Sucessfully!!";
        echo $message;
        $_SESSION['email']=$Results['email'];
        $_SESSION['idstu']=$Results['idstu'];
        $_SESSION['fname']=$Results['fname'];
        header('refresh:2;url=stuhome.php');


    }
else
{
    $message = "Invalid email or password!!";
    echo $message;
    echo $user;
    echo $email;
    echo $password;
}
}
else
{
    $qry="SELECT * FROM employer WHERE empmail='" . $email . "' AND pass='" . $password . "'";
    $strSQL = mysqli_query($mysqli,$qry);
    $Results = mysqli_fetch_array($strSQL);
    if(count($Results)>=1)
    {
    $message = $Results['email']." Login Sucessfully!!";
        $_SESSION['empmail']=$Results['empmail'];
        $_SESSION['idemp']=$Results['idemp'];
        $_SESSION['ename']=$Results['ename'];
        header('refresh:2;url=empinternship.php');
    }
    else
    {
        $message = "Invalid email or password!!";
        echo $message;
        echo $user;
        echo $email;
        echo $password;
    }



}

mysqli_close($mysqli);


?>
