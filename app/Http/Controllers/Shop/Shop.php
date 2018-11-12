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
use App\Http\Controllers\Controller;

class Shop extends Controller
{
    /*
     * Articles
     */
    public function getAllArticles(){

        $categories = self::getAllCategory();

        foreach ($categories as $key=>$value){
            $articles =\DB::table('article')->where('fk_article_category_id', '=', $value->id)->get();
            foreach ($articles as $key2=> $value2){
                $articles[$key2]->name = self::getTranslation($value2->name);
                $articles[$key2]->description = self::getTranslation($value2->description);

            }
            $categories[$key]->articles=$articles;
        }
        return($categories);

    }
    public function getArticleByID($id){
        $article =\DB::table('article')->where('id', '=', $id)->get();
        foreach ($article as $key=> $value){
            $article[$key]->name = self::getTranslation($value->name);
            $article[$key]->description = self::getTranslation($value->description);

        }
        return response()->json(($article[0]));
    }
    /*
     * Categories
     */
    private function getAllCategory(){
        $categories = \DB::table('article_category')->get();

        foreach ($categories as $key=> $value){
            $categories[$key]->name = self::getTranslation($value->name);
        }
        return $categories;
    }
    public function getCategoryArticles($id){
        $categories = \DB::table('article_category')->where('id', '=', $id)->get();

        foreach ($categories as $key=> $value){
            $categories[$key]->name = self::getTranslation($value->name);

            $articles =\DB::table('article')->where('fk_article_category_id', '=', $value->id)->get();
            foreach ($articles as $key2=> $value2){
                $articles[$key2]->name = self::getTranslation($value2->name);
                $articles[$key2]->description = self::getTranslation($value2->description);

            }
            $categories[$key]->articles=$articles;
        }
        return($categories);
    }
    public function getOrderByInfo($id, $email){

    }

}