<?php
	session_start();
	//Create a session of username and logging in the user to the chat room
	if(isset($_POST['username'])){
		$_SESSION['username']=$_POST['username'];
	}
	//Unset session and logging out user from the chat room
	if(isset($_GET['logout'])){
		unset($_SESSION['username']);
		header('Location:login.php');
	}
?>
<html>
<head>
	<title>Chatting</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css" />
	<script type="text/javascript" src="jquery-1.10.2.min.js" ></script>
  <script type="text/javascript" src="pubnub-3.7.13.min.js" ></script>
</head>
<body>
<div class='header'>
	<h1>
		Chatter
	</h1>
		<?php // Adding the logout link only for logged in users  ?>
		<?php if(isset($_SESSION['username'])) { ?>
		<a class='logout' href="?logout"><p id="logout">Logout</p></a><br>
		<?php } ?>
</div>

<div class='chatcontrols'>
	<form method="post" onsubmit="return submitchat();">
		<div class='main'>
			<?php //Check if the user is logged in or not ?>
			<?php if(isset($_SESSION['username'])) { ?>
			<div id='result'></div>
		<br>
		<input type='text' name='chat' id='chatbox' autocomplete="off" required placeholder="ENTER CHAT HERE" />
		<input type='submit' name='send' id='send' class='btn btn-send' value='Send' />
		<input type='button' name='clear' class='btn btn-clear' id='clear' value='Clear' title="Clear Chat" />
	</form>
<script>
// Javascript function to submit new chat entered by user
function submitchat(){
		if($('#chat').val()=='' || $('#chatbox').val()==' ') return false;
		$.ajax({
			url:'chat.php',
			data:{chat:$('#chatbox').val(),ajaxsend:true},
			method:'post',
			success:function(data){
				$('#result').html(data); // Get the chat records and add it to result div
				$('#chatbox').val(''); //Clear chat box after successful submition

				document.getElementById('result').scrollTop=document.getElementById('result').scrollHeight; // Bring the scrollbar to bottom of the chat resultbox in case of long chatbox
			}
		})
		return false;
};
// Function to continously check the some has submitted any new chat
setInterval(function(){
	$.ajax({
			url:'chat.php',
			data:{ajaxget:true},
			method:'post',
			success:function(data){
				$('#result').html(data);
			}
		})
}
,1000);
// Function to chat history
$(document).ready(function(){
	$('#clear').click(function(){
		if(!confirm('Are you sure you want to clear chat?'))
			return false;
		$.ajax({
			url:'chat.php',
			data:{username:"<?php echo $_SESSION['username'] ?>",ajaxclear:true},
			method:'post',
			success:function(data){
				$('#result').html(data);
			}
		})
	})
})
</script>
<?php } else { ?>
<div class='userscreen'>
	<form method="post">
		<input type='text' class='input-user' required placeholder="ENTER YOUR NAME HERE" name='username' />
		<input type='submit' class='btn btn-user' value='START CHAT' />
	</form>
</div>
<?php } ?>

</div>
</div>
<script>
  <?php
  $count = 0;
$myFile = "chat.txt";
$fh = fopen($myFile, 'r');
while(!feof($fh)){
    $fr = fread($fh, 8192);
    $count += substr_count($fr, 'br');
}
fclose($fh);
?>
  setInterval(function()
{
  <?php

  $count2 = 0;
$myFile = "chat.txt";
$fh = fopen($myFile, 'r');
while(!feof($fh)){
    $fr = fread($fh, 8192);
    $count2 += substr_count($fr, 'br');
}
fclose($fh);
  if($count2<$count) {
    ?>
    alert("under construction");
  
<?php } ?>

}, 3000);
</script>
</body>
</html>
