<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<title>Register page</title>
</head>
<script language="JavaScript">

function validateForm()
{
var userName= document.getElementById('uname').value;
var rollNo= document.getElementById('regno').value;
if( userName =='' || rollNo=='' ){
	alert('Please enter User Name & Roll Number');
	return false;
}
document.getElementById('status').innerHTML="ADAPTIVE ALGORITHM IS RUNNING... PLEASE WAIT!";
document.forms[0].submit();
}
alert('Please Dont close the browser and try to complete within the given time or else you will be disqualified');
</script>

<?php $pict='fir.jpg'; 
$db_host = "localhost";

$db_username = "root";

$db_pass = "";

$db_name = "grandin";

@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");

@mysql_select_db("$db_name") or die ("No database");

@mysql_query("DELETE FROM marks");
@mysql_close();
?>


<body style="background-image: url('<?php echo $pict; ?>'); background-repeat: no-repeat; background-attachment: fixed; background-position: center;background-color:black ; " >

<form action="mainpage.php" form="loginForm" id="loginForm" method="post">

<p id="status" style="font-color:'blue';"></p>
</br></br>
<br>
<br>
<br>

<br><br>
<br>
<br><br>
<br>
<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font>
<table align="center" cellpadding="2">
<tr>
<td><font size="6" color="red"><b>Name :</b></font></td>
<td><input name="uname" id="uname" type="text" style="height: 22px; width: 128px"></td>
</tr>
<tr>
<td><font size="6" color="red"><b>Reg Number :</b></font></td>
<td><input name="regno" id="regno" type="text" style="width: 128px; height: 22px"></td>
<td><input name="progcount" id="progcount" type="hidden" value="0" style="width: 128px; height: 22px"></td>
<td><font size="6" color="skyblue"><b><input name="Submit1" type="button" value="submit" onclick="validateForm()"></b></font></td>&nbsp;
</tr>
</table>


</form>

</font>
</body>
</html>
