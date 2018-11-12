<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class article extends Model
{
    use Notifiable;

    /**
     *  Table
     *
     *
     */
    protected $table = 'article';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    public function order()
    {
        return $this->belongsToMany('App\order', 'p_article_order',
            'article_id', 'order_id');
    }
    public function size()
    {
        return $this->belongsToMany('App\size', 'p_size_article',
            'article_id', 'size_id');
    }

}
