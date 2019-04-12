<?php

public function redirect($url)
{
	header("location: " . $url);
	exit();
}

?>