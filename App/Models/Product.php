<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Product extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    //TODO: 1. Hàm load sản phẩm
    public static function getProduct()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM product');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    // public static function getIdProduct($proid){
    //     $db = static::getDB();
    //     $id= $_GET('idpro');
    //     $sql = "SELECT * FROM product WHERE id=:id";
    //     $stmt = $conn->prepare($sql);
    //     //Thiết lập kiểu dữ liệu trả về
    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
    //     //Gán giá trị và thực thi
    //     $stmt->execute(array('id' => $id));
    //     return $stmt->fetch();
    // }
    //TODO: 2. Hàm thêm sản phẩm
    public static function addProduct(){
        $db = static::getDB();
        $pro_title= $_POST['pro_title'];
        $pro_price= $_POST['pro_price'];
        $pro_quantity= $_POST['pro_quantity'];
        $pro_discount= $_POST['pro_discount'];
        $pro_description= $_POST['pro_description'];
        $pro_specification= $_POST['pro_specification'];
        $pro_img= $_FILES["pro_img"]['name'];

       
        if(file_exists(dirname(__DIR__) . "../../public/assets/img/" . $_FILES["pro_img"]['name'])){
            $store= $_FILES["pro_img"]["name"];
        }
        else{
            $sql = "INSERT INTO product (pro_title, pro_price, pro_quantity, pro_discount, pro_description, 
            pro_specification, pro_img) 
            VALUES ('".$pro_title."',".$pro_price." ,".$pro_quantity.",".$pro_discount.",'".$pro_description."',
            '".$pro_specification."','".$pro_img."')";
            $stmt = $db->query($sql); 
            if($stmt){
                $file = $_FILES["pro_img"]['tmp_name'];
                $path= dirname(__DIR__) . "../../public/assets/img/".$_FILES["pro_img"]['name'];
                move_uploaded_file($file,$path);
                //echo "Tải tập tin thành công";
                move_uploaded_file($_FILES["pro_img"]["tmp_name"],"/BanHang/public/assets/img/".$_FILES["pro_img"]['name']);
                //header('Location: /BanHang/public/Admin/product.php');
            }
            else{
                header('Location: /BanHang/public/Admin/product.php');
            }
        }
    }
    //TODO: 3. Hàm xóa sản phẩm
    public static function deleteProduct($proid){
        $db = static::getDB();
        $stmt=$db->prepare("DELETE FROM product WHERE id=:proid");
        $stmt->bindParam(":proid",$proid,PDO::PARAM_INT);
        $stmt->execute();
    }
    //TODO: 4. Hàm cập nhật sản phẩm
    public static function updateProduct($id,$pro_title,$pro_price,$pro_quantity,$pro_discount,$pro_description,$pro_specification,$pro_img){
        $db = static::getDB();
        $data = [
            'pro_title' => $pro_title,
            'pro_price' => $pro_price,
            'pro_quantity' => $pro_quantity,
            'pro_discount' => $pro_discount,
            'pro_description' => $pro_description,
            'pro_specification' => $pro_specification,
            'pro_img' => $pro_img,
            'id' => $id,
        ];

        
        $sql = "UPDATE product SET pro_title =:pro_title, pro_price =:pro_price, pro_quantity =:pro_quantity,
                pro_discount =:pro_discount, pro_description=:pro_description, pro_specification=:pro_specification,
                pro_img=:pro_img WHERE id=:id";
        $stmt= $db->prepare($sql);
        $stmt->execute($data);
    }
    //TODO: 5. Hàm lấy id để load ra chi tiết sản phẩm tương ứng
    public static function getIdProduct($id){
        $db = static::getDB();
        $id = $_GET['idpost'];
        $sql = "SELECT * FROM product WHERE id=:id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();      
    }
}
        
        

