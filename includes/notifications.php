<?php

if(isset($_POST["reset-password"]))
{
	echo "<script> showNotificationModal('Password Reset', 'Your password has been reset successfully!') </script>";
}

if(isset($_POST["create-account"]))
{
	echo "<script> showNotificationModal('Account Creation', 'Your account has been created successfully! You will receive an email once your account has been activated.') </script>";
}

if(isset($_SESSION["account-inactive"]))
{
	echo "<script> showNotificationModal('Account Inactive', 'Your account is currently locked and is not active. If you believe this is an error contact an administrator.') </script>";
	 	unset($_SESSION['account-inactive']);
}

if(isset($_SESSION["login-incorrect"]))
{
	echo "<script> showNotificationModal('Login Details Incorrect', 'Your username or password is incorrect.') </script>";
	unset($_SESSION['login-incorrect']);
}

?>