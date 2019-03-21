<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue_List extends Model
{
    protected $table = 'queue_lists';
    protected $fillable = [
        'user_id',
        'karaoke_list_id',
        'is_admin',
    ];

    public function karaoke_list()
    {
        return $this->belongsTo('App\Karaoke_List');
    }
}
