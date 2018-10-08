<?php
/**
 * Created by PhpStorm.
 * User: mbrugger
 * Date: 01.10.2018
 * Time: 13:27
 */

namespace App\Http\Controllers\Shop;
use \App\article;
use \App\article_category;

class Shop
{
    /*
     * Articles
     */
    public function getAllArticles(){


        return(article::with('category')->get());
    }
    public function getArticleByID($id){

    }
    /*
     * Categories
     */
    public function getAllCategory(){

    }
    public function getCategoryArticles(){

    }
    public function getOrderByInfo($id, $email){

    }

}