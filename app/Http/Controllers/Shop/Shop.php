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
use \App\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Lang;
use App\Http\Controllers\Mail\Mailer;




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

        $size = \DB::table('p_size_article')
            ->join('article_size', 'article_size.id', '=', 'p_size_article.size_id')->where('p_size_article.article_id', '=', $id)->get(array('article_size.name as label','article_size.id as value'));


        foreach ($size as $key => $value){
            //print_r($value);
            $array['label']=$value->label;
            $array['value']=$value->value;

            //unset($size[$key]->label);
            $size[$key]->value = $array;
        }
        foreach ($article as $key=> $value){
            $article[$key]->name = self::getTranslation($value->name);
            $article[$key]->description = self::getTranslation($value->description);
            $article[$key]->size=$size;
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

        $request['email']=$email;
        $validate = Validator::make($request, [
            'email' => 'required|email',
        ]);
        if($validate->fails()){
            abort(403, $validate->errors());
        }

        $order=\DB::table('order')->where([['id','=', $id],['email', '=', $email]])->get();
        if (count($order)==1){
            $order=  \DB::table('order')->join('order_status', 'order.fk_status_id', '=', 'order_status.id')->where('order.id', '=', $id)->get(['order.id', 'order.created_at', 'order.updated_at', 'order.paid_date', 'order_status.name', 'order.name', 'order.fsname', 'order.address', 'order.npa', 'order.city', 'order.email', 'order_status.name as status']);
            $order[0]->status=self::getTranslation($order[0]->status);
            $order[0]->articles = \DB::table('p_article_order')->where('order_id', '=', $id)->get();

            foreach ($order[0]->articles as $key => $value){
                $article=\DB::table('article')->where('id', '=', $value->article_id)->get(['name','description', 'price', 'image_path']);
                $size=\DB::table('article_size')->where('id', '=', $value->size_id)->get(['name']);
                $quantity=$value->quantity;
                //$quantity=10;
                //return $size;
                $order[0]->articles[$key]=$article[0];
                $order[0]->articles[$key]->size=$size[0]->name;
                $order[0]->articles[$key]->quantity=$quantity;
                $order[0]->articles[$key]->name=self::getTranslation($order[0]->articles[$key]->name);
                $order[0]->articles[$key]->description=self::getTranslation($order[0]->articles[$key]->description);


            }
            return response()->json($order[0]);
        }else{
            abort(403, Lang::get('errors.MissmatchOrder'));
        }
    }
    public function addOrder(Request $request){
        $input =$request->all();
        if(!is_array($input)){
            \Log::error('Bad arg type for order input');
            abort(403, lang::get('errors.notAuthorized'));
        }
        $validate = Validator::make($input, [
            'name' => 'required|regex:/(^[A-Za-z0-9âàéèïäç\'.üö\- ]+$)+/|max:60',
            'fsname' => 'required|regex:/(^[A-Za-z0-9âàéèïäç\'.üö\- ]+$)+/|max:60',
            'address'=>'required|regex:/(^[A-Za-z0-9âàéèïäç\'.üö\- ]+$)+/|max:100',
            'npa'=>'required|regex:/(^[0-9 ]+$)+/|max:40',
            'city'=>'required|regex:/(^[A-Za-zâàéèïäçüö\- ]+$)+/|max:40',
            'email'=>'required|email|max:60',
            'articles.*.size_id'=>'required|int',
            'articles.*.article_id'=>'required|int',
            'articles.*.size_id'=>'required|int',
            'articles.*.quantity'=>'required|int|max:10',
            'paid'=>'required|boolean'
        ]);
        if($input['paid'])$paid=date('Y-m-d H:i:s'); else $paid=NULL;
        if($validate->fails()){
            abort(403, $validate->errors());
        }
        $orderId= \DB::table('order')->insertGetId([
            'name'=>$input['name'],
            'fsname'=>$input['fsname'],
            'address'=>$input['address'],
            'city'=>$input['city'],
            'npa'=>$input['npa'],
            'email'=>$input['email'],
            'paid_date'=>$paid,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        foreach($input['articles'] as $key => $value){
            $input['articles'][$key]['order_id']=$orderId;
        }
        \DB::table('p_article_order')->insert($input['articles']);


        Mailer::sendOrderConfirmation($orderId, $input['email']);

        $input['status_code']=200;
        return response()->json($input);



    }

}