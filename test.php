<?php
	session_start();
	include("csrf.class.php");

	$csrf = new CSRF(true);
	$set = $csrf->generate(3600);

	if($_POST){
		if($csrf->check_valid($_POST)){
			echo "ok";
		}else{
			echo "no";
		}
	}
?>
<form action="" method="post">
	<input type="hidden" name="<?=$csrf->get_last()["key"]?>" value="<?=$csrf->get_last()["token"]?>">
	<input type="submit" value="Gönder">
</form>