<?php $username=$_POST["uname"];
$regnumber=$_POST["regno"];
$progcount=$_POST["progcount"];
echo "ADAPTIVE TEST ALGORTHM FINISHED! FILES ARE PUT IN YOUR DESKTOP!!";
session_start();
$_SESSION['noviews']=1;
$_SESSION['user']="$username";
$_SESSION['regnumber']=$regnumber;
$_SESSION['logintime']= round(microtime(true) * 1000);

$parent=$regnumber;
$path="C:\Users\Shibin\Desktop\/$parent";

$pathname1=$path;
mkdir ( $pathname1,0700 );
$easy="C:\Users\Shibin\Desktop\/$parent\/easy";
$hard="C:\Users\Shibin\Desktop\/$parent\/hard";
$normal="C:\Users\Shibin\Desktop\/$parent\/normal"; 

$pathname4=$normal;
mkdir ( $pathname4,0700 );

$pathname2=$hard;
mkdir ( $pathname2,0700 );

$pathname3=$easy;
mkdir ( $pathname3,0700 );

$easycount=1;
$normalcount=1;
$hardcount=1;


for ($x=1; $x<=17; $x++)
{
$flname=$x."_C.c";
$output1=shell_exec("tcc $flname 2>&1 &");

$strpos=strpos($output1, "*")+3;
$errcount=substr($output1, $strpos,2);
 $program = file_get_contents($flname);
$nlines=strlen($program);

$text= $program;

$loop= substr_count($text, 'for');

$while= substr_count($text, 'while');

$var= substr_count($text, 'int');
$main=substr_count($text, 'main');

$if=substr_count($text, 'if');

$switch=substr_count($text, 'switch');

$ashstick=substr_count($text, '*');

$array=substr_count($text, '[');


$total=$loop+$while+$var+$main+$if+$switch+$ashstick+$array;
//echo $total."<br>";


if($errcount <= 1 && $nlines <= 300 && $total <=5)
{

//echo"easy<br>";
$adpfname=$easy."/".$easycount."_C.c";
$fh=fopen($adpfname,'w');
fwrite($fh, $program);
$easycount++;
}
elseif($errcount <= 1 && $nlines <= 400 && $total <=10)
{

//echo"normal<br>";
$adpfname=$normal."/".$normalcount."_C.c";
$fh=fopen($adpfname,'w');
fwrite($fh, $program);
$normalcount++;
}
elseif($errcount <= 1 && $nlines <= 600 && $total <=5)
{

//echo"hard<br>";
$adpfname=$hard."/".$hardcount."_C.c";
$fh=fopen($adpfname,'w');
fwrite($fh, $program);
$hardcount++;
}
elseif($errcount <=2  && $nlines <= 200 && $total <=10)
{

//echo"normal<br>";
$adpfname=$normal."/".$normalcount."_C.c";
$fh=fopen($adpfname,'w');
fwrite($fh, $program);
$normalcount++;
}
elseif($errcount <= 2 && $nlines <= 400 && $total <=10)
{

//echo"normal<br>";
$adpfname=$normal."/".$normalcount."_C.c";
$fh=fopen($adpfname,'w');
fwrite($fh, $program);
$normalcount++;
}
elseif($errcount <= 2 && $nlines <= 600 && $total <=15)
{

//echo"hard<br>";
$adpfname=$hard."/".$hardcount."_C.c";
$fh=fopen($adpfname,'w');
fwrite($fh, $program);
$hardcount++;
}
elseif($errcount <=3  && $nlines > 10 && $total <=15)
{

//echo"hard<br>";
$adpfname=$hard."/".$hardcount."_C.c";
$fh=fopen($adpfname,'w');
fwrite($fh, $program);
$hardcount++;
} 
}
?>

<form action="mainpage1.php" name="mainform" id="mainform" method="post">
<input type="hidden" name="progcount" id="progcount" value='<?php echo $progcount; ?>'>
</form> 
<script>
document.mainform.submit();
</script>
</body>
</html>
