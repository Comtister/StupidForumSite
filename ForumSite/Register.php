<html>
<head><title>Kayıt ol</title></head>
<body>
<form action="Register.php" method="post">
    Kullanici Adi: <input type="text" name="username">
    <br />Sifre: <input type="password" name="password">
    <br />Sifre Tekrar: <input type="password" name="repassword">
    <br />Email: <input type="text" name="email">
    <br /> <input type="submit" name="submit" value="Kayıt Ol"> or <a href="login.php">Giris</a>
</form>
</body>
</html>

<?php

$connect = mysqli_connect("localhost","root","") or die("Bağlantı Hatası");
mysqli_select_db($connect,"ForumDB");

$username = @$_POST['username'];
$password = @$_POST['password'];
$repass = @$_POST['repassword'];
$email = @$_POST['email'];

if(isset($_POST['submit'])){

    if($username && $password && $repass && $email){
        if(strlen($username) >= 6 && strlen($username) < 25 && strlen($password) > 6){
            if($password == $repass){
                $sql = "INSERT INTO user (username, password, email) VALUES ('".$username."', '".$password."', '".$email."')";

                if($query = mysqli_query($connect,$sql)){
                    echo "Kayıt basarili";
                }else{
                    echo "Kayıt basarisiz";
                }

            }else{
                echo "Şifreler Eşleşmiyor";
            }
        }else{
            echo "Kullanıcı adı veya şifre 6 karakterden az olamaz";
        }
    }else{
        echo "Tüm alanları doldurun";
    }




}

?>