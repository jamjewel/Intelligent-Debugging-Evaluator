<html><font size="6" color="black"><b>
<?php
$text=$_POST["TextArea"];
$timetaken=$_POST["timetaken"];
session_start();
$rollnumber=$_SESSION['regnumber'];
$refCount = $_SESSION['noviews'];
$progcount=$_POST["progcount"];

$usname=$_SESSION['user'];

$filename="$rollnumber.c";




//if($timetaken > 120000)
//{
//$_SESSION['textcont']="$text";
//$fh=fopen($filename,'w');
//fwrite($fh,$text);
//header( 'Location: main3.php' ) ;
//}
//else

$_SESSION['textcont']="$text";

$fh=fopen($filename,'w');
fwrite($fh,$text);

shell_exec("cd C:\xampp\htdocs\webpage");
$output=shell_exec("tcc $filename 2>&1 &");

echo "welcome ".$usname."\n</br>";
echo " Number of compiles - ".$_SESSION['noviews']."\n</br>";
$_SESSION['noviews'] = $refCount+1;
$pos = strpos($output, "*");

if ($pos == false) {
echo "no errors!!!";

}
else
{
$stringpos=strpos($output, "*")+3;
$errorcount=substr($output, $stringpos,2);
echo"Number of error- \n".$errorcount;
}
?>

<head>

<title>DeBugging!</title>
</head>
</br>
<tr>
<td><input name="countdown" id="countdown" type="text" style="width: 35px; height: 22px;font-size:18px;font-weight: bold;"></td>
<td><b>Seconds Remaining</b></td>
</tr>

<?php $pic='main.jpg'; ?>

<body style="background-image: url('<?php echo $pic; ?>');background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover;" >

<form name="mainform2" method="post">

<br>
<textarea name="TextArea" style="width: 800px; height: 450px"><?php echo $text; ?></textarea>&nbsp;
<input type="hidden" name="progcount" id="progcount" value='<?php echo $progcount; ?>'>
<input type="hidden" name="timetaken" id="timetaken" value='<?php echo $timetaken; ?>'>
<input name="compel" type="button" value="compile" style="width: 69px; height: 22px" onclick="comp()">
<input name="final" type="button" value="submit" style="width: 69px; height: 22px" onclick="nextquestion()">
</font>
</form>
<script language="JavaScript">

var d=120-document.getElementById("timetaken").value;
var myVar=setInterval(function(){myTimer()},1000);
var t;
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
	document.mainform2.action="calcResult.php";
	document.mainform2.submit();
}

function comp()
{
document.getElementById("timetaken").value=120-t;
document.mainform2.action = "main2.php";
document.mainform2.submit();
}
function nextquestion()
{
document.mainform2.action = "calcResult.php";
document.mainform2.submit();
}

</script>
</body>

</html>
