<?php
ob_start();
session_start();
define('title','Witaj na trakcie królewskim');
include_once 'system/config.php';
include_once 'templates/header2.php';
login("no");


if (isset($_POST['username']) and isset($_POST['password']) )
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if ($username!="" and $password!="")
	{
		$temp=mysql_query("SELECT id FROM user WHERE username='$username' and password ='$password'");
		$prawda=mysql_num_rows($temp);
		$temp=mysql_fetch_array($temp);
		$id=$temp['id'];
		$userek = mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE username='$username' and password ='$password'"));		
		if ($prawda==1)
		{				  
			  $_SESSION['password'] = $userek['password'];			
			  $_SESSION['user_id'] = $id;			
			  $_SESSION['username'] = $username;			
			  mysql_query("UPDATE user SET online = 'y' WHERE id=".$_SESSION[user_id]."");				  
			  echo('Logowanie jako '.$_SESSION['username'].'...');		
			  move("home.php");	
		}			
		else  
		{
			echo ('Podałeś złe dane. Spróbuj ponownie.');
			move("login.php");	
		}
	}	
}	
else
{
?>
    <form action="" method="post" style="text-align:right">
        <table align="center" border="0">
            <tr>
                <td><strong>Użytkownik:</strong></td>
                <td><input name="username" type="text" value="" /><br></td>
            </tr>
            <tr>
                <td><strong>Hasło:</strong></td>
                <td><input name="password" type="password" value="" /><br></td>
            </tr>
            <tr>
            	<td colspan="2"><input type="submit" value="Zaloguj" /><br></td>
            </tr>
        </table>	
    </form>	
<?	
}

include_once 'templates/footer2.php';
?>