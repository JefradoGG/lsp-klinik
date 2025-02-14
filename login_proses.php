<?php

    $defaultusername1 = "userlsp";
    $defaultpassword1 = "smkisfibjm";

    $defaultusername2 = "rpl";
    $defaultpassword2 = "123";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(($username === $defaultusername1 && $password === $defaultpassword1) || 
        ($username === $defaultusername2 && $password === $defaultpassword2)){
            echo "<meta http-equiv='refresh' content='1;url=beranda.php'>";
        }else{
            echo "<script>alert('Username Atau Password Salah!')</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        }
    }
?>
