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
    <body>
    <center><a href="index.php">Ana Sayfa</a> | <a href="account.php">Hesabım</a> | <a href="members.php">Üyeler</a> | <a href="index.php?action=logout">Çıkış</a> </center>
    <center>
        <a href="post.php"><button>Konu Oluştur</button></a>
        <br/>
        <br/>

        <?php
        if($_GET['id']){
            $check = mysqli_query($connect,"SELECT * FROM topics WHERE topic_id='".$_GET['id']."'");
            if(mysqli_num_rows($check)){
                while($row = mysqli_fetch_assoc($check)){
                     $check_u = mysqli_query($connect,"SELECT * FROM user WHERE username='".$row['topic_creator']."'");
                     while($row_u = mysqli_fetch_assoc($check_u)){
                         $user_id = $row_u['id'];
                     }
                     echo "<h1><a href='profile.php?id=$user_id'>".$row['topic_name']."</a></h1>";
                     echo "<h5>Oluşturan".$row['topic_creator']."<br/>";
                     echo "<br/>".$row['topic_content'];
                }
            }else{

            }
        }else{
            header("Location: index.php");
        }
        ?>

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


