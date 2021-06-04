<?php
    if(@$_SESSION['username']){
?>

<center><a href="index.php">Ana Sayfa</a> | <a href="account.php">Hesabım</a> | <a href="members.php">Üyeler</a> | <a href="index.php?action=logout">Çıkış</a> </center>


<?php
    }else{
        header("Location: Login.php");
    }
        ?>