<html>
<head>
<title>Admin</title>
</head>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<?php $pic='admin.jpg'; ?>

<body style="background-image: url('<?php echo $pic; ?>');background-repeat: no-repeat; background-attachment: fixed; background-position: center;" >
<center>
<?php

$db_host = "localhost";

$db_username = "root";

$db_pass = "";

$db_name = "grandin";

@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");

@mysql_select_db("$db_name") or die ("No database");
@mysql_query("DELETE FROM winner1");
?>
<h2><font size="4" color="red">The Database have been cleared</h2>
</font>
<script language="JavaScript">

function back()
{
document.delt.action="admin.php";
document.delt.submit();

}
</script>
<form name="delt">
<input name="trunk" type="button" value="Back" style=" height: 22px" onclick="back()">
</center>
</form>
</body>
</html>
