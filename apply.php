<?php
/**
 * Created by PhpStorm.
 * User: Apoorv yadav
 * Date: 20-05-2018
 * Time: 22:23
 */
session_start();
if(isset($_SESSION['fname'])){
    echo "Apply here, ";
    $idstu=$_SESSION['idstu'];
    echo $_SESSION['fname'];
    echo "<a href='logout.php'> Logout</a>";}
else{
    header('location:index.php');

}
$id=$_GET['id'];
echo '<form action="applyconfirm.php?id='.$id.'" method="POST" autocomplete="on" >
    <feildset>
        <legend><u>Fill in the Details</u></legend><br>
        
        Why should we Hire you?:   <textarea title="hire"  name="hire" rows=" 5" cols="20"required></textarea><br>
        If you can, Please show us some of your previous work:<textarea title="work" name="work" rows="5" col="20" required></textarea><br>
        When can you join this intership and for how long? <textarea title="when" name="when" rows="5" col="20" required></textarea><br>
        <br><br><input type="submit" class="button" value="apply"/></feildset>
</form>';
?>

