<?php
function localization($user,$localization)
{
	if($user !== $localization)
	{
		header('location: !!error!!');
	}
}
?>