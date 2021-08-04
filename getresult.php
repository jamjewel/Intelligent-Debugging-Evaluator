<?php
// from: http://php.thedemosite.co.uk/
// version 1.2
if (isset($_POST['password'])) // if the password is set then the form has been submitted on login.php page
{
 $dbc = dbc::instance();
 $result = $dbc->prepare("SELECT * from members where username =:username and password =:password");
 $result->bindParam(':username', $username, PDO::PARAM_STR);
 $result->bindParam(':password', $password, PDO::PARAM_STR);
 $rows = $dbc->executeGetRows($result);
 if(count($rows)) echo "<font color=#008000><Center><b>**Successful Login**</b></Center></font>";
 else echo "<font color=#ff0000><Center><b>**Failed Login**</b></Center></font>";
}
else echo "<font color=#ff8000><Center><b>**No login attempted**</b></Center></font>";
?>