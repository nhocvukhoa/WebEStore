<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use \Core\View;
use App\Models\User;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Admin extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    //TODO: 1. Điều hướng mở trang Admin
    public function indexAdminAction(){
        $user =User::getAll();
        View::render('Admin/index.php',['variable' => $user]);
    }
    //TODO: 2. Yêu cầu mở chức năng quản lý danh mục
    public function categoryAdminAction(){
        $user =User::getAll();
        View::render('Admin/category.php',['variable' => $user]);
    }
    //TODO: 3. Yêu cầu thêm danh mục
    public function addCategoryAdminAction(){
         Category::insertCategory();
         header('/BanHang/public/Admin/category.php');
         View::render('Admin/category.php');
    }
    //TODO: 4. Yêu cầu xóa danh mục
    public function deleteCategoryAdminAction(){
        $id=$this->route_params['id'];
        // var_dump($id); die;
        Category::removeCategory($id);
        header('Location: /BanHang/public/Admin/category.php');
    }
    //TODO: 5. Yêu cầu cập nhật danh mục
    public function updateCategoryAdminAction(){
        $id=$this->route_params['id'];
        $cat_title=$_POST['cat_title'];
        $cat_description=$_POST['cat_description'];
        Category::updateCategory($id, $cat_title,$cat_description);
        header('Location: /BanHang/public/Admin/category.php');
    }

    //TODO: 6. Yêu cầu mở chức năng quản lý sản phẩm
    public function productAdminAction(){
        $user =User::getAll();
        View::render('Admin/product.php',['variable' => $user]);
    }
    //TODO: 7. Yêu cầu thêm sản phẩm
    public function addProductAdminAction(){
        Product::addProduct();
        header('Location: /BanHang/public/Admin/product.php');
    }
    //TODO: 8. Yêu cầu xóa sản phẩm
    public function deleteProductAdminAction(){
        $id=$this->route_params['id'];
        Product::deleteProduct($id);
        header('Location: /BanHang/public/Admin/product.php');
    }
    //TODO: 9. Yêu cầu cập nhật sản phẩm
    public function updateProductAdminAction(){
        $id=$this->route_params['id'];
        // var_dump($this->route_params);die;
        $pro_title=$_POST['pro_title'];
        $pro_price=$_POST['pro_price'];
        $pro_quantity=$_POST['pro_quantity'];
        $pro_discount=$_POST['pro_discount'];
        $pro_description=$_POST['pro_description'];
        $pro_specification=$_POST['pro_specification'];
        $pro_img=$_POST['pro_img'];
        Product::updateProduct($id,$pro_title,$pro_price,$pro_quantity,$pro_discount,$pro_description,$pro_specification, $pro_img);
        header('Location: /BanHang/public/Admin/product.php');
    }
}
