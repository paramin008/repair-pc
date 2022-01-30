<html>
<head>
<title>ThaiCreate.Com PHP Sending Email</title>
</head>
<body>
    
    <?php
    include ('config.php'); 
 $sql = "SELECT repair.user_id, users.first_name
 FROM users
 INNER JOIN repair
 ON repair.user_id = users.id;"; 
$query = mysqli_query($dbcon,$sql);?>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
<TR>

<TD><?php echo $result["first_name"];?></TD>
<TD><?php echo $result["user_id"];?></TD>

</TR><?php } ?>
<form action="index.php" method="post" name="frmMain">
<table width="343" border="1">
<tr>
<td>To</td>
<td><input name="txtTo" type="text" id="txtTo"></td> 
</tr> 
<tr>
<td>Subject</td>
<td><input name="txtSubject" type="text" id="txtSubject"></td>
</tr>
<tr>
<td>Description</td>
<td><textarea name="txtDescription" cols="30" rows="4" id="txtDescription"></textarea></td>
</tr>

<tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Send"></td>
</tr>
</table>
<br>
<br>
<br>
</form>
</body>
</html>