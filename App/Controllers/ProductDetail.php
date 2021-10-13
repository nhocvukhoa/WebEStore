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
class ProductDetail extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
     public function getIdProductAction(){
        $id=$this->route_params['id'];
        Product::getIdProduct($id);
        header('Location: BanHang/public/product-detail.php');
    }
}
