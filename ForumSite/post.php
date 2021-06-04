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
<?php include("header.php"); ?>
<form action="post.php" method="post">
    <center>
        <br/>
        Konu Başlığı: <br/><input type="text" name="baslik_adi" style="width: 400px;"><br/>
        <br/>
        İçerik:<br/>
        <textarea style="resize: none; width: 400px; height: 300px;" name="con"></textarea>
        <br/>
        <input type="submit" name="submit" value="Post" style="width: 400px;">
    </center>
</form>
<body>
</body>
</html>




    <?php

    $t_name = @$_POST['baslik_adi'];
    $content = @$_POST['con'];

    if(isset($_POST['submit'])){
       if($t_name && $content){
           $sql = "INSERT INTO topics (topic_name,topic_content,topic_creator) VALUES ('".$t_name."', '".$content."', '".$_SESSION["username"]."') ";
            if($query = mysqli_query($connect,$sql)){
                echo "Başarılı";
            }else{
                echo "Başarısız";
            }
       }else{
           echo "Tüm Alanları doldurun";
       }
    }

}else{
    echo "Giriş Yapmalısınız";
}
?>
