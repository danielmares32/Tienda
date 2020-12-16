<?php
	session_start();
	if(@$_GET['salir']==TRUE)
	{
		session_unset();
		session_destroy();
		header('Location: index.php');
                
	}