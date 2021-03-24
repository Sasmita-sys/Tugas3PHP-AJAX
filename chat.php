<?php
session_start();

if(isset($_POST['ajaxsend']) && $_POST['ajaxsend']==true){
	// Code to save and send chat
	$chat = fopen("chat.txt", "a");
	$data="<b>".$_SESSION['username'].':</b> '.$_POST['chat']."<br>";
	fwrite($chat,$data);
	fclose($chat);

	$chat = fopen("chat.txt", "r");
	echo fread($chat,filesize("chat.txt"));
	fclose($chat);
} else if(isset($_POST['ajaxget']) && $_POST['ajaxget']==true){
	// Code to send chat history to the user
	$chat = fopen("chat.txt", "r");
	echo fread($chat,filesize("chat.txt"));
	fclose($chat);
} else if(isset($_POST['ajaxclear']) && $_POST['ajaxclear']==true){
	// Code to clear chat history
	$chat = fopen("chat.txt", "w");
	$data="<b>".$_SESSION['username'].'</b> cleared chat<br>';
	fwrite($chat,$data);
	fclose($chat);
}
?>
