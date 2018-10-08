<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class article_size extends Model
{
    use Notifiable;

    /**
     *  Table
     *
     *
     */
    protected $table = 'article_size';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
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
        return $this->belongsToMany('App\article', 'p_size_article',
            'article_id', 'size_id');
    }
}
