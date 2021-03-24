<!-- <!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 id="title">Welcome</h1>
	<p id="desciption">Keep in mind to be polite with each other!.</p>
	<form action="chat.php" method="post">
        <label for="kolom">
            <?php
                $myfile = fopen("chat.txt", "r") or die("Unable to open the file!");
                while(!feof($myfile)) {
                    echo fgets($myfile) . "<br>";
                }
                header("chat.php");
            ?>
        </label>
        <label for="cont">
            Message:<br>
            <input name="cont" type="text" />
		</label>
        <label for="send">
            <input type="submit" name="send" value="Send" />
        </label>
	</form>
</body>
</html> -->
<?php
// if (isset($_POST['send'])){
//     $chat = $_POST['cont'];
//     $file = file_get_contents("chat.txt");
//     $string = "$chat";
//     if(!strstr($file, "$string")){
//         $myFile = "chat.txt";
//         $fh = fopen($myFile, 'a') or die("Unable to open the file");
//         $stringData = "$chat\n";
//         fwrite($fh, $stringData);
//         fclose($fh);
//         header("chat.php");
//     }
// }
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