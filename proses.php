<style>
.alert {
    padding: 10px;
    width: 20%;
    min-height: 10%;
    max-height: 30%;
    border: 0;
    background-color: #f44336;
    color: white;
}
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}
.closebtn:hover {
    color: black;
}
</style>
<?php
    if (isset($_POST['verif'])){    
        $user = $_POST['username'];
        $pwd = $_POST['pwd'];
        $file = file_get_contents("user.txt");
        $onklik = "this.parentElement.style.display='none';";
        if(!strstr($file, "$user||$pwd")){
            $text1 = '<span class="closebtn" onclick="'.$onklik.'">&times;</span>Sorry! You Insert an Invalid Name & Email. Please Use a Valid name & email and Try Again.';
            echo '<div class="alert">'.$text1.'</div>';
            include("login.php");
        }
        else{
            $text2 = '<span class="closebtn" onclick="'.$onklik.'">&times;</span>Welcome '. $user .' .<br/>You Have Successfully Logging.';
            echo '<div class="alert">'.$text2.'</div>';
            header("location: chatting.php");
        }
    }
?>