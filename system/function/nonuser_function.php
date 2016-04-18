<?php
function logout()
{
	if(login==true)
	{
		header('location: home.php');
	}
}
?>