<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Super_Category extends Model
{
    protected $table = 'super_categorys';
    
    protected $fillable = [
        'super_category_name'
    ];

    public function normal_category()
    {
        return $this->hasMany('App\Normal_Category','super_category_id');
    }

    public function karaoke_list()
    {
        return $this->hasMany('App\Karaoke_List','super_category_id');
    }
}
