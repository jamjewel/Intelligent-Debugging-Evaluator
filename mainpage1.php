<?php 

$progcount=$_POST["progcount"];
session_start();
$username=$_SESSION['user'];
$regnumber=$_SESSION['regnumber'];
$_SESSION['noviews']=1;

$parent=$regnumber;

$easy="C:\Users\Shibin\Desktop\/$parent\/easy";
$hard="C:\Users\Shibin\Desktop\/$parent\/hard";
$normal="C:\Users\Shibin\Desktop\/$parent\/normal";

$previouserrorcount=-1;

$db_host = "localhost";

$db_username = "root";

$db_pass = "";

$db_name = "grandin";

@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");

@mysql_select_db("$db_name") or die ("No database");

$result=@mysql_query("SELECT errorcount FROM marks WHERE prognumber=(SELECT MAX(prognumber) FROM marks)");

while($row = @mysql_fetch_array($result))
{
	$previouserrorcount=$row['errorcount'];
}

@mysql_close();


if ($previouserrorcount == -1)
{
	$randsize=0;
	$directory=$easy;
}

else if ($previouserrorcount <= 1)
{
	$randsize=4-1;
	$directory=$hard;
}

else
{
	$randsize=8-1;
	$directory=$normal;
}



$fileno = rand(1, $randsize);
$filename=$directory."/".$fileno."_C.c";
$output=shell_exec("tcc $filename 2>&1 &");
$stringpos=strpos($output, "*")+3;
$errorcount=substr($output, $stringpos,2);
$errorcount;

$progcount=$progcount+1;
$progremaining=10-$progcount;

?>
<html>
<head>
<title>DeBugging!</title>
</head>



<?php $pic='main.jpg'; ?>
<tr>
	<td><span style="float:left;"> <input name="countdown" id="countdown" type="text"  style="width: 35px; height: 30px;font-size:18px;font-weight: bold;"></span></td>
	<td><b><span style="float:left;font-size:30px;">&nbsp; Seconds Remaining</span></b></td>
	
	
	<td><span style="float:right;"><input name="progremaining" id="progremaining" type="text"  value='<?php echo $progremaining?>' style="width: 35px; height: 30px;font-size:18px;font-weight: bold;"></span></td>
	<td><b><span style="float:right;font-size:30px;">Programs Remaining &nbsp;</span></b></td>
	</tr>
	<br>
	<br>
<body style="background-image: url('<?php echo $pic; ?>');background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover;" >
<form name="mainForm"  method="post">
<div style="float:left;font-size:30px;"> <b>
<?php echo "welcome ".$username
			?></b>
</div>
	<br>
	<br>
	<br>
	
	<textarea name="TextArea" style="width: 800px; height: 450px">
	<?php $compilerout = file_get_contents($filename);
	$string = str_replace("<br />", "", $compilerout);
	echo $string;
		//echo nl2br(file_get_contents($filename));
	  //Delete that file so that it wont repeat
	?></textarea>&nbsp;
	<input type="hidden" name="progcount" id="progcount" value='<?php echo $progcount; ?>'>
	<input type="hidden" name="timetaken" id="timetaken">
	<input name="comp" type="button" value="compile" style="width: 69px; height: 22px" onclick="compile()"> 
	<input name="Save" type="button" value="Submit" style="width: 69px; height: 22px" onclick="invincible()">
	<script language="JavaScript">
	var d=120;
	var t;
	
	var myVar=setInterval(function(){myTimer()},1000);
	function myTimer()

	{
	t=d--;
	if(t<=-1)
	{
	myStopFunction()
	}
	else
	{
	document.getElementById("countdown").value=t;
	}
	}
	function myStopFunction()
	{
		clearInterval(myVar);
		document.mainForm.action="calcResult.php";
		document.mainForm.submit();
	}
alert('<?php echo  $errorcount;?> Number of ERRORs in this program ');
function compile()
{
	document.getElementById("timetaken").value=120-d;
	document.mainForm.action="main2.php";
	document.mainForm.submit();
	
}
function invincible()
{
	
	document.mainForm.action="calcResult.php";
	document.mainForm.submit();
}

</script>
</form>
</body>
</html>
