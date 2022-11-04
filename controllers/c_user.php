<?php
include_once "models/m_user.php";
include_once "core/controller.php";
class c_user extends controller {

    function register(){
        
        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];

            $insert = new m_user();
            $result = $insert->insert_account($username,md5($password),$email);

            if($result){
                $this->redirect($this->base_url("login.html"));
                die();
            }else{
                echo "them that bai"; 
                die();
            }

        }
        include "views/auth/register.php";
    }

    function login(){
        
        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $insert = new m_user();
            $result = $insert->login_account($username,md5($password));

            if($result){
                echo "<script>alert('Đăng nhập thành công!')</script>";
                $this->redirect($this->base_url(""));
                
            }else{
                $_SESSION['err_login'] = "Tài khoản hoặc mật khẩu không đúng";
                die();
            }

        }
        include "views/auth/login.php";
    }

}
