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
        <?php echo '<table border="1px">'; ?>
        <tr>
            <td>
                <span>ID</span>
            </td>
            <td width="400px;" style="text-align: center">
                İsim
            </td>
            <td width="400px;" style="text-align: center">
                Görüntülenme
            </td>
            <td width="400px;" style="text-align: center">
                Yaratıcı
            </td>
        </tr>
    </center>
    </body>
</html>
<?php
    $check = mysqli_query($connect,"SELECT * FROM topics");
    if(mysqli_num_rows($check) != 0){
       while($row = mysqli_fetch_assoc($check)){
            @$id = $row['topic_id'];
            echo "<tr>";
            echo "<td>".$row['topic_id']."</td>";
            echo "<td style='text-align: center;'><a href='topic.php?id=$id'>".$row['topic_name']."</a></td>";
            echo "<td>".$row['views']."</td>";
            echo "<td>".$row['topic_creator']."</td>";
       }
    }else{
        echo "Konu Yok";
    }

    echo "</table>";
    if(@$_GET['action'] == "logout"){
        session_destroy();
        header("Location: login.php");
    }

}else{
    echo "Giriş Yapmalısınız";
}
?>

