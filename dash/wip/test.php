<?php
$passwort = 'testtest';

$salt = ''; 
for ($i = 0; $i < 22; $i++) { 
	$salt .= substr('./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', mt_rand(0, 63), 1);
	}
							
$_POST['f']['password'] = crypt(
	$_POST['f']['password'],'$2a$10$' . $salt);
		
echo $_POST['f']['password']

?>