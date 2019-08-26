<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileEntry extends Model
{
    protected $fillable = ['filename', 'mime', 'path', 'size', 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
