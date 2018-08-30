<?php
/**
 * Created by PhpStorm.
 * User: Apoorv yadav
 * Date: 19-05-2018
 * Time: 22:37
 */
session_start();
?>
<head>
    <title>
        Internship
    </title>
</head>
<body>
<link rel="stylesheet" href="app.css">
<form action="login.php" method="post" autocomplete="on">

    User: <input type="radio" name="user" value="student" required>Student<br>
    <input type="radio" name="user" value="employer">Employer<br>

    Email Id: <input type="Email" title="email" name="email" required>
    <br>
    Password:  <input type="Password" title="pkey" name="pkey" required>
    <br>
    <input type="submit" class="button" value="Login">
</form>
New to Intershala? Register here (<a href="sign.php">Students</a>/<a href="signe.php">Employer</a>)
</body>
