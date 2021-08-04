<html><font size="6" color="ffffff"><b>
</br></br></br>
<?php
session_start();
$refCount = $_SESSION['noviews'];
$rollnumber=$_SESSION['regnumber'];
$usname=$_SESSION['user'];
$logingtime=$_SESSION['logintime'];
$timetaken= (round(microtime(true) * 1000))-$logingtime;
if($timetaken > 1200000)
{
	header( 'Location: fail.php' ) ;
}
?>
<center>
<head>
<title>result!</title>
</head>

<?php $pic='resul.jpg'; ?>

<body style="background-image: url('<?php echo $pic; ?>');background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover;" >


<form name="mainform2" method="post">
	<?php 

$db_host = "localhost";

$db_username = "root";

$db_pass = "";

$db_name = "grandin";

@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");

@mysql_select_db("$db_name") or die ("No database");

//@mysql_query("CREATE DATABASE my_testingh") or die ("Could not create table");
//@mysql_query("INSERT INTO winner (regnumber, name, mark)
//VALUES (1001, 'grandin',35)")
					
$result=@mysql_query("SELECT * FROM `marks`");
echo '<table border="3"; cellspacing="8"; cellSpacing="30">
<tr>
<th><b><p style="font-size:20px; color:red;">PROGRAM NUMBER</th>
<th><b><p style="font-size:20px; color:red;">ERROR COUNT</th>
<th><b><p style="font-size:20px; color:red;">TIME MARKS</th>
<th><b><p style="font-size:20px; color:red;">COMPILE MARKS</th>
<th><b><p style="font-size:20px; color:red;">MAIN MARKS</th>
<th><b><p style="font-size:20px; color:red;">TOTAL MARKS (100)</th>
</tr>';

while($row = @mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<tr>";
		echo '<td><b><p style="font-size:20px; color:skyblue;">' . $row['prognumber'] . "</td>";
		echo '<td><b><p style="font-size:20px; color:skyblue;">' . $row['errorcount'] . "</td>";
		echo '<td><b><p style="font-size:20px; color:skyblue;">' . $row['timemark'] . "</td>";
		echo '<td><b><p style="font-size:20px; color:skyblue;">' . $row['compmark'] . "</td>";
		echo '<td><b><p style="font-size:20px; color:skyblue;">' . $row['mainmark'] . "</td>";
		echo '<td><b><p style="font-size:20px; color:skyblue;">' . $row['total'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
	
	$averagemark=0;
	$result1 = @mysql_query("SELECT AVG(total) FROM marks");
	while($row1 = @mysql_fetch_array($result1))
	{
		$averagemark=$row1['AVG(total)'];
	}
	@mysql_query("INSERT INTO winner1 (regnumber, name, mark)
	VALUES ('$rollnumber','$usname','$averagemark')");
	echo "Average Marks Scored: ".$averagemark;
	@mysql_close();
	?>
           <br>
	</font>
	</form>

</body>

</html>
