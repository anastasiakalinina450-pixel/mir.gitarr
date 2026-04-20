<?php
if (isset($_POST['login'])){
	$name = $_POST['login'];
}
if (isset($_POST['pass'])){
	$pass = $_POST['pass'];
}
if (isset($_POST['repeat_pass'])){
	$repeat_pass = $_POST['repeat_pass'];
}
if (isset($_POST['email'])){
	$email = $_POST['email'];
}
if (empty($name)){
	echo 'укажите имя.';
	exit;
}
else if (empty($email)){
	echo 'укажите адрес электронной почты.';
	exit;
}
if (empty($pass)){
	echo 'укажите пароль.';
	exit;
}
else if ($repeat_pass != $pass){
	echo 'Пароли не совпадают.';
	exit;
}
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("mydb") or die(mysql_error());
$result = mysql_query(
	"SELECT *". "FROM `user`".
	"WHERE `name`='".mysql_real_escape_string($name)."' AND `password`='".mysql_real_escape_string($pass)."' ") or die(mysql_error());
$user = mysql_fetch_assoc($result);
mysql_free_result($result);
if($user == true){
	echo "Придумайте новый логин и/или пароль. Или вы уже зарегестрированы.";}
else{
	echo "Регистрация прошла успешно!";
	mysql_query("INSERT INTO user (name, email, password)
		VALUES
		('".$_POST['login']."', '".$_POST['email']."', '".$_POST['pass']."')
		") or die(mysql_error());
}
mysql_close();
?>