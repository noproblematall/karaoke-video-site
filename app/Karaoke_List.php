<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karaoke_List extends Model
{
    protected $table = 'karaoke_lists';
    protected $fillable = [
        'normal_category_id',
        'super_category_id',
        'title',
        'artist',
        'code',
        'cdgpath',
        'mp3path',
    ];

    public function queue_list()
    {
        return $this->hasone('App\Queue_List','karaoke_list_id');
    }

    public function super_category()
    {
        return $this->belongsTo('App\Super_Category');
    }

    public function normal_category()
    {
        return $this->belongsTo('App\Normal_Category');
    }
}
