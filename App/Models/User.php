<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM user');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //TODO: 1. Hàm kiểm tra việc nhập khi đăng kí thành viên
    public static function checkRegister(){
        $db = static::getDB();
        $error=[
            'username' => '',
            'password' => '',
            'confirm' => 'confirm',
            'firstname' => '',
            'lastname' => '',
            'address' => '',
            'mobie' => '',
            'email' => '',
        ];
        $username = $password = $confirm= $firstname = $lastname = $address = $mobie = $email = '';
        //TODO: 1.1 Check username
        if(empty($_POST['username'])){
            $error['username'] = 'Không được để trống username';
        }
        if(empty($_POST['password'])){
            $error['password'] = 'Không được để trống password';
        }else{
           $password = $_POST['password'];
           $confirm = $_POST['confirm'];
           if($password=!$confirm){
               $error['password'] = 'Password không được kết nối';
               $error['confirm'] = 'Password không được kết nối';
           }
        }
        if(empty($_POST['firstname'])){
            $error['firstname'] = 'Không được để trống firstname';
        }
        if(empty($_POST['lastname'])){
            $error['lastname'] = 'Không được để trống lastname';
        }
        if(empty($_POST['address'])){
            $error['address'] = 'Không được để trống address';
        }
        if(empty($_POST['lastname'])){
            $error['lastname'] = 'Không được để trống lastname';
        }
        if(empty($_POST['mobie'])){
            $error['mobie'] = 'Không được để trống mobie';
        }
        if(empty($_POST['email'])){
            $error['email'] = 'Không được để trống email';
        }else{
            $email= $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = 'Vui lòng nhập đúng định dạng email';
            }
        }
        print_r($error);
        
    }
    //TODO: 2. Hàm kiểm tra việc đăng nhập
    public static function checkLogin(){
        $db = static::getDB();
        try{
            if(isset($_POST["login"])){
                if(empty($_POST["username"]) || empty($_POST["passwordHash"])){
                    $message = '<label>Tất cả các trường phải nhập</label>';
                }
                else{
                    $sql = "SELECT * FROM user WHERE username = :username AND
                    passwordHash =:passwordHash";
                    $stm =$db->prepare($sql);
                    $stm->excute(
                        array(
                            'username' => $_POST["username"],
                            'passwordHash' => $_POST["passwordHash"]
                        )
                     );
                     $count= $stm->rowCount();
                     
                     if($count >0){
                         $_SESSION["username"] = $_POST["username"];
                         header ("Location: /BanHang/public/Admin/index.php");
                     }
                     else{
                         $message = '<label>Tên đăng nhập hoặc mật khẩu sai</label>';
                     }
                }
             }
        }
        catch(PDOException $error){
            $message = $error->getMessage();
        }
    }
        
}
   
