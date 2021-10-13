<?php



namespace App\Controllers;

use App\Models\Product;
use \Core\View;
use App\Models\User;


/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    //*TODO: 1. Yêu cầu mở trang HOME
    public function indexAction()
    {
        $user = User::getAll();
        View::render('Home/index.php', ['variable' => $user]);
    }
    //TODO: 2. Yêu cầu chuyển trang PRODUCT
    public function productListAction(){
        $user =User::getAll();
        View::render('Home/product-list.php',['variable' => $user]);
    }
    //TODO: 3. Yêu cầu chuyển trang PRODUCT DETAIL
    public function productListDetailAction(){
        $user =User::getAll();
        View::render('Home/product-detail.php',['variable' => $user]);
    }
    //TODO: 3.1. Yêu cầu lấy id sản phẩm để chuyển trang chi tiết
    // public function getIdProductAction(){
    //     $id=$this->route_params['id'];
    //     Product::getIdProduct($id);
    //     header('Location: BanHang/public/product-detail.php');
    // }
    //TODO: 4. Yêu cầu chuyển trang CART
    public function cartAction(){
        $user =User::getAll();
        View::render('Home/product-detail.php',['variable' => $user]);
    }
    //TODO: 5. Yêu cầu chuyển trang CHECKOUT
    public function checkoutAction(){
        $user =User::getAll();
        View::render('Home/checkout.php',['variable' => $user]);
    }
    //TODO: 6. Yêu cầu chuyển trang đăng kí thành viên
    public function registerAction(){
        View::render('Home/register.php');
    }
    //TODO: 7. Yêu cầu kiểm tra việc nhập khi đăng kí thành viên
    public function checkRegisterAction(){
        User::checkRegister();
        //header('Location: Home/register.php');
    }
    //TODO: 8. Yêu cầu chuyển trang đăng nhập
    public function loginAction(){
        View::render('Home/login.php');
    }
    
    //TODO: 9. Yêu cầu kiểm tra đăng nhập
    public function checkLoginAction(){
        User::checkLogin();
    }
    //TODO: 9. Yêu cầu load thông tin sản phẩm trong trang PRODUCT
  
    
    // public function indexAdminAction(){
    //     $user =User::getAll();
    //     View::render('Admin/index.php',['variable' => $user]);
    // }
    


    public function getAllAction() {
        View::renderTemplate('Home/index.html');
    }
}
