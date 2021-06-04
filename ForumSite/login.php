<html>
<head><title>Giriş Yapın</title></head>

<body>
<form action="login.php" method="post">
    username:<input type="text" name="username"><br />
    password:<input type="password" name="password"><br />
    <input type="submit" value="login" name="submit">
</form>
</body>
</html>



<?php
session_start();
$connect = mysqli_connect("localhost","root","") or die("Bağlantı Hatası");
mysqli_select_db($connect,"ForumDB");

$username = @$_POST['username'];
$password = @$_POST['password'];

    if($username && $password){

        $check = mysqli_query($connect,"SELECT * FROM user WHERE username='".$username."'");
        $rows = mysqli_num_rows($check);

        if(mysqli_num_rows($check) != 0){
            while($row = mysqli_fetch_assoc($check)){
                $db_username = $row['username'];
                $db_password = $row['password'];
            }

            if($username == $db_username && $password == $db_password){
                echo "Giriş başarılı";
                @$_SESSION["username"] = $username;
                header("Location: index.php");
            }else{
                echo "giriş başarısız";
            }

        }else{
            echo "Böyle bir kullacını yok";
        }

    }else{
        echo "Tüm alanları doldurun";
    }



?>