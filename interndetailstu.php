<?php
/**
 * Created by PhpStorm.
 * User: Apoorv yadav
 * Date: 20-05-2018
 * Time: 21:22
 */
session_start();
$id=$_GET['id'];
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'internshala'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$sql = "SELECT * 
		FROM internships WHERE internshipid='".$id."'";

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

if(isset($_SESSION['fname'])){
    echo "Welcome ";
    $idstu=$_SESSION['idstu'];
    echo $_SESSION['fname'];
    echo "<a href='logout.php'> Logout</a>";
}
?>
<html>
<head>
    <title>Displaying MySQL Data in HTML Table</title>
    <style type="text/css">
        body {
            font-size: 15px;
            color: #343d44;
            font-family: "segoe-ui", "open-sans", tahoma, arial;
            padding: 0;
            margin: 0;
        }
        table {
            margin: auto;
            font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
            font-size: 12px;
        }

        h1 {
            margin: 25px auto 0;
            text-align: center;
            text-transform: uppercase;
            font-size: 17px;
        }

        table td {
            transition: all .5s;
        }

        /* Table */
        .data-table {
            border-collapse: collapse;
            font-size: 14px;
            min-width: 537px;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #e1edff;
            padding: 7px 17px;
        }
        .data-table caption {
            margin: 7px;
        }

        /* Table Header */
        .data-table thead th {
            background-color: #508abb;
            color: #FFFFFF;
            border-color: #6ea1cc !important;
            text-transform: uppercase;
        }

        /* Table Body */
        .data-table tbody td {
            color: #353535;
        }
        .data-table tbody td:first-child,
        .data-table tbody td:nth-child(4),
        .data-table tbody td:last-child {
            text-align: right;
        }

        .data-table tbody tr:nth-child(odd) td {
            background-color: #f4fbff;
        }
        .data-table tbody tr:hover td {
            background-color: #ffffa2;
            border-color: #ffff0f;
        }

        /* Table Footer */
        .data-table tfoot th {
            background-color: #e5f5ff;
            text-align: right;
        }
        .data-table tfoot th:first-child {
            text-align: left;
        }
        .data-table tbody td:empty
        {
            background-color: #ffcccc;
        }
    </style>
</head>
<body>
<table class="data-table">
    <caption class="title">Internship Detail</caption>
    <thead>
    <tr>
        <th>Organization</th>
        <th>Internship Type</th>
        <th>Stipend</th>
        <th>Type</th>
        <th>Duration</th>
        <th>Posted on</th>
        <th>Apply By</th>
        <th> </th>
    </tr>
    </thead>
    <tbody>
    <?php

    while ($row = mysqli_fetch_array($query))
    {
        echo '<tr>
					<td>'.$row['empname'].'</td>
					<td>'.$row['type'].'</td>
					<td>Rs.'.$row['stipend'].'</td>
					<td>'. $row['jointype']. '</td>
					<td>'.$row['duration'].' months</td>
					<td>'.$row['posted'].'</td>
					<td>'.$row['applyby'].'</td>
                    <td><a href="apply.php?id='.$row['internshipid'].'">Apply now</a></td>
				</tr>';
        echo 'Description<br>';
        echo $row['descrip'];
        echo '<br>Prerequisite<br>';
        echo $row['req'];
        echo '<br>Perks<br>';
        echo $row['perks'];
    }
    ?>

    </tbody>
    <tfoot>
    <tr></tr>
    </tfoot>
</table>
</body>
</html>