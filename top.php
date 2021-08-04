<html>
<head>
<title>Winners</title>
</head>	
<?php $pic='winner.jpg'; ?>

<body style="background-image: url('<?php echo $pic; ?>');background-repeat: no-repeat; background-attachment: fixed; background-position: center;" >
<font size="4" color="black"><b>
<center>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<?php
$db_host = "localhost";

$db_username = "root";

$db_pass = "";

$db_name = "grandin";
@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");

@mysql_select_db("$db_name") or die ("No database");
$top3=@mysql_query("SELECT `regnumber`, `name`, `mark` FROM `winner1` WHERE 1
ORDER BY `winner1`.`mark`  DESC LIMIT 3");
echo '<table cellspacing="8"; cellSpacing="25">
<tr>
<th><b><p style="font-size:20px; color:red;">Reg number</th>
<th><b><p style="font-size:20px; color:red;">Name</th>
<th><b><p style="font-size:20px; color:red;">Mark</th>
</tr>';
while($winner = @mysql_fetch_array($top3))
{
echo "<tr>";
echo '<td><b><p style="font-size:20px; color:skyblue;">' . $winner['regnumber'] . "</td>";
echo '<td><b><p style="font-size:20px; color:skyblue;">' . $winner['name'] . "</td>";
echo '<td><b><p style="font-size:20px; color:skyblue;">' . $winner['mark'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>

</b></font>
<script language="JavaScript">

function back()
{
document.adback.action="admin.php";
document.adback.submit();

}
</script>
<form name="adback">
<input name="backad" type="button" value="Back" style=" height: 22px" onclick="back()">
</center>
</body>
</html>
