<?php
session_start();
if(@$_SESSION["username"]){


?>
    <html>
    <head>
        <title>Ana Sayfa</title>
    </head>
    <?php
    include("header.php");
    echo "<center><h1>Kayıtlı Kullanıcılar</h1>";
    $connect = mysqli_connect("localhost","root","") or die("Bağlantı Hatası");
    mysqli_select_db($connect,"ForumDB") or die("Veritabanı Bağlantı Hatası");
    $check = mysqli_query($connect,"SELECT * FROM user");
    $rows = mysqli_num_rows($check);
    while($row = mysqli_fetch_assoc($check)){
        $id = $row['id'];
        echo "<a href='profile.php?id=$id'>".$row['username']."</a><br/>";
    }
    echo "</center>";
    ?>
    <body>
    </body>
    </html>

<?php
    if(@$_GET['action'] == "logout"){
        session_destroy();
        header("Location: login.php");
    }

}else{
    echo "Giriş Yapmalısınız";
}
?>
