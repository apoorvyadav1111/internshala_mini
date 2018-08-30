<?php
/**
 * Created by PhpStorm.
 * User: Apoorv yadav
 * Date: 20-05-2018
 * Time: 02:46
 */
session_start();
?>
<form action="addinterntodb.php" method="POST" autocomplete="on" >
    <feildset>
        <legend><u>Post a new Internship</u></legend><br>
        Internship category:<select title="type" name="type"><option value="engineering">Engineering</option>
            <option value="Business Studies">Business Studies</option>
            <option value="Content Writing">Content writing</option></select><br>
        Duration:	<input type="number" title="duration" name="duration" required>(in months)<br>
        Stipend:   <input type="number" title="stipend" name="stipend" required><br>
        Type:<select title="jointype" name="jointype"><option value="Work from home">work from home </option>
            <option value="Full time">Full Time</option>
        <option value="both">both</option></select><br>
        Apply by:<input type="date" title="Apply by" name="applyby" required><br>
        Start Date:<input type="date" title="Start Date" name="startdate" required><br>
        Description:   <textarea title="description"  name="description" rows=" 5" cols="20"required></textarea><br>
        Prerequisite :<textarea title="prere" name="prere" rows="5" col="20" required></textarea><br>
        Perks: <textarea title="perks" name="perks" rows="5" col="20" required></textarea><br>
        <br><br><input type="submit" class="button" value="Host"/></feildset>
</form>
