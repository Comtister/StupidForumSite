<?php
session_start();
$connect = mysqli_connect("localhost","root","") or die("Bağlantı Hatası");
mysqli_select_db($connect,"ForumDB") or die("Veritabanı Bağlantı Hatası");
if(@$_SESSION["username"]){
    ?>
<html>
<head>
    <title>Ana Sayfa</title>
</head>
<?php
include("header.php"); ?>

<body>
<center>
    <?php
    $check = mysqli_query($connect,"SELECT * FROM user WHERE username='".$_SESSION['username']."'");
    $rows = mysqli_num_rows($check);
    while ($row = mysqli_fetch_assoc($check)){
        $username = $row['username'];
        $id = $row['id'];
        $email = $row['email'];
        $replies = $row['replies'];
        $topics = $row['topics'];
    }
    ?>
    username : <?php echo $username ?> <br/>
    id : <?php echo $id ?> <br/>
    email: <?php echo $email ?><br/>
    cevaplar:<?php echo $replies ?><br/>
    konular:<?php echo $topics ?><br/>
</center>
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

