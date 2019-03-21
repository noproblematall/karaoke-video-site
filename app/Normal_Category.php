<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Normal_Category extends Model
{
    protected $table = "normal_categorys";
    protected $fillable = [
        'super_category_id',
        'normal_category_name'
    ];

    public function super_category()
    {
        return $this->belongsTo('App\Super_Category');
    }

    public function karaoke_list()
    {
        return $this->hasMany('App\Karaoke_List', 'normal_category_id');
    }
}
