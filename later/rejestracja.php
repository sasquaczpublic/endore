<?php
include_once 'system/config.php';
include_once 'css/head.php';
session_start();
if (isset($_SESSION['user_id']) and isset($_SESSION['username']))
{
	header('location: index.php');
}
else
{

	
	$username = $_POST['username'];      
	$password = $_POST['password'];
	$mail = $_POST['mail'];
	
	if($_GET['act'] == 'blad' )
	{
		echo('Wypełnij wszystkie pola');
	}
	
	
	if($_GET['act'] == 'ok' )
	 
	 {
		 
	
		if (empty($_POST['username']))
		{
			header('location: rejestracja.php?act=blad');
		}
		elseif (empty($_POST['password']))
		{
			header('location: rejestracja.php?act=blad');
		}
		elseif (empty($_POST['password2']))
		{
			header('location: rejestracja.php?act=blad');
		}
		elseif (empty($_POST['mail']))
		{
			header('location: rejestracja.php?act=blad');
		}
		
		elseif ($_POST['password'] === $_POST['password2'])
		
		  {
			
			$prawda = mysql_num_rows(mysql_query("SELECT username FROM user WHERE username = '$username'"));
			$prawdam = mysql_num_rows(mysql_query("SELECT mail FROM user WHERE mail = '$mail'"));
			  
			if(!preg_match("/^[A-Za-z]+$/",$_POST['username']))
			
			{
				echo ('Ciekawe czy wołają na Ciebie '."$username");
			
			}
			
			elseif (!preg_match("/^([a-z0-9+_-]+)(.[a-z0-9+_-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix", $mail))
			{
				echo ('Niepoprawny adres e-mail');
				}
			
			elseif ($prawdam==1)
			{
				echo ('Adres '."$mail".' jest już używany.');
				}
			
			elseif ($prawda==0)   
			
			{
		
			mysql_query("INSERT INTO user (username,password,mail) VALUES('$username','$password','$mail')");
		
				echo('Konto '.$username.' zostało utworzone. Teraz zostaniesz przeniesiony do ekranu logowania. <meta http-equiv="Refresh" content="2; url=login.php" />');
				
			  
	
		}
		 else
	
		{
	
			echo("Taki użytkownik już istnieje. Spróbuj ponownie");
	
		}
	
	  }
	 
	  else
	  {
		  echo ("Podane hasła nie zgadzają się");
	  }
	
	
	 }
	
	if (empty($_POST['username']) && empty($_POST['password']) && empty($_POST['password']) && empty($_POST['mail']))
	{
	?>
	
	<html>
	
	<body>
	
	<h1>Dołącz do gry!</h1>
	
	Przed założeniem konta prosimy o zapoznanie się z instrukcją. Jest krótka, ale zawiera informacje ułatwiające start w tej grze.<br><br><br>
	
	<form action="?act=ok" method="post">
	<table align="center" border="0">
		<tr>
			<td><strong>Nazwa konta:</strong></td>
			<td><input name="username" type="text" value="" /><br></td>
		</tr>
		<tr>
			<td><strong>Hasło:</strong></td>
			<td><input name="password" type="password" value="" /><br></td>
		</tr>
		<tr>
			<td><strong>Powtórz hasło:</strong></td>
			<td><input name="password2" type="password" value="" /><br></td>
		</tr>
		<tr>
			<td><strong>Adres e-mail:</strong></td>
			<td><input name="mail" type="text" value="" /><br></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Zarejestruj" /><br></td>
		</tr>
	</table>
	
	
	</form>
	
	</body>
	
	</html>
	
	<?php
	}
}

include_once 'css/foot.php';
?>