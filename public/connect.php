<?php 
    function ConnectDB(){
        try{
            //TODO: kết nối
            $conn = new PDO("mysql:host=localhost;dbname=test",'root','');
            //TODO: thiết lập chế độ lỗi
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //TODO: thông báo thành công
            //echo 'Kết nối thành công';
            return $conn;
        }
        catch(PDOException $e){
            echo "Kết nối thất bại: ". $e->getMessage();
        }
    }
?>