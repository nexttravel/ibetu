<?
	header('Content-Type: text/html; charset=utf-8');
	$con = mysqli_connect("localhost", "newtrip", "qkqhajdcjddl5!", "newtrip")or die("DB connect error");
	session_start();

	$signed_id = $_SESSION['signed_id'];
?>