<?php
include ('config.php');
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="MyXls.xls"');#ชื่อไฟล์
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">

<HTML>

<HEAD>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD><BODY>


<TABLE  x:str BORDER="1">

<TR>
					
<TD><b>Date</b></TD>

<TD><b>Inventory</b></TD>

<TD><b>Problem</b></TD>
<TD><b>Repairer</b></TD>
<TD><b>Technician</b></TD>
<TD><b>Status</b></TD>

</TR>
<?php 
 
 $sql = "SELECT repair.id ,repair.problem, problem.name
 FROM repair
 LEFT JOIN problem
 ON repair.problem = problem.id;"; 
$query = mysqli_query($dbcon,$sql);?>
<?php

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
<TR>

<TD><?php echo $result["name"];?></TD>
<TD><?php echo $result["id"];?></TD>

</TR><?php } ?>



</TABLE>

</BODY>

</HTML>