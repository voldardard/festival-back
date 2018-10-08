<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class order extends Model
{

    use Notifiable;

    /**
     *  Table
     *
     *
     */
    protected $table = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'fsname', 'paid_date', 'address', 'npa', 'city', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function article()
    {
        return $this->belongsToMany('App\article', 'p_article_order',
            'article_id', 'order_id');
    }

}
