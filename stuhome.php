<?php
/**
 * Created by PhpStorm.
 * User: Apoorv yadav
 * Date: 20-05-2018
 * Time: 19:11
 */
session_start();
echo "welcome ";
echo $_SESSION['fname'];
?>
<a href="internships.php">View Internships</a><br>


<a href="applied.php">View Applied Internships</a><br>

<a href="logout.php">Logout?</a><br>
