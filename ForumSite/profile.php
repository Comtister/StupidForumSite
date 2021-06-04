<?php
session_start();
if(@$_SESSION["username"]){


?>
<html>
<head>
    <title>Ana Sayfa</title>
</head>
</html>
    <?php
    include("header.php");
    $connect = mysqli_connect("localhost","root","") or die("Bağlantı Hatası");
    mysqli_select_db($connect,"ForumDB");
    echo "<center>";
    if(@$_GET['id']){
       $check = mysqli_query($connect,"SELECT * FROM user WHERE id='".$_GET['id']."'");
       $rows = mysqli_num_rows($check);

       if(mysqli_num_rows($check) != 0){
           while($row = mysqli_fetch_assoc($check)){
               echo "<h1>".$row['username']."</h1><br/>";
               echo "<b>Cevaplar:</b>".$row['replies']."<br/>";
               echo "<b>Konular:</b>".$row['topics']."<br/>";
           }

       }else{
           echo "Hesap Bulunamadı";
       }

    }else{
        header("Location: index.php");
    }
    echo "</center>"
    ?>


    <?php
    if(@$_GET['action'] == "logout"){
        session_destroy();
        header("Location: login.php");
    }

}else{
    echo "Giriş Yapmalısınız";
}
?>