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
<?PHP
$onklik = "this.parentElement.style.display='none';";
if (isset($_POST['kirim'])){
    $user = $_POST['username'];
    $pwd = $_POST['pwd'];
    $nama = $_POST['nama'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $file = file_get_contents("user.txt");
    $string = "$user||$pwd";
    if(!strstr($file, "$string")){
        $myFile = "user.txt";
        $fh = fopen($myFile, 'a') or die("can't open file");
        $stringData = "$user||$pwd\n";
        fwrite($fh, $stringData);
        fwrite($fh, $nama."\n");
        fwrite($fh, $email."\n");
        fwrite($fh, $city."\n");
        fwrite($fh, "#############################\n");
        fclose($fh);
        
        $text1 = '<span class="closebtn" onclick="'.$onklik.'">&times;</span>Your registration information successfully Inserted.';
        echo '<div class="alert">'.$text1.'</div>';
        include("login.php");
    }
    else{
        $text2 = '<span class="closebtn" onclick="'.$onklik.'">&times;</span>Sorry the name: '. $user .' is already in database. please use defrent name & email.';
        echo '<div class="alert">'.$text2.'</div>';
        include("register.php");
    }
}
?>