<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //table name
    protected $table = 'todos';
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
