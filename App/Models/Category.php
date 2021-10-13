<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Category extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    //TODO: 1. Hàm load danh mục
    public static function getCategory()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM category');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //TODO: 2. Hàm thêm danh mục
    public static function insertCategory(){
            $db = static::getDB();
            $data['cat_title']= isset($_POST['cat_title']) ? $_POST['cat_title'] : '';
            $data['cat_description']= isset($_POST['cat_description']) ? $_POST['cat_description'] : '';
            $sql = "INSERT INTO category (cat_title,  cat_description) 
                    VALUES ('".$data['cat_title']."', '".$data['cat_description']."')";
            $stmt = $db->query($sql); 
    }
    //TODO: 3. Hàm xóa danh mục
    public static function removeCategory($catid){
            $db = static::getDB();
            $stmt=$db->prepare("DELETE FROM category WHERE id=:catid");
            $stmt->bindParam(":catid",$catid,PDO::PARAM_INT);
            $stmt->execute();
    }
    //TODO: 4. Hàm cập nhật danh mục
    public static function updateCategory($id,$cat_title,$cat_description){
        $db = static::getDB();
        $data = [
                'cat_title' => $cat_title,
                'cat_description' => $cat_description,
                'id' => $id,
        ];
        $sql= "UPDATE category SET cat_title =:cat_title, cat_description =:cat_description WHERE id=:id";
        $stmt =$db->prepare($sql);
        $stmt->execute($data);
    }
}
    

        
        

