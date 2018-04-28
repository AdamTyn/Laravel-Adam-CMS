<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table    = 'details';
    public $timestamps  = false;
    protected $fillable = ['detail', 'last_change'];
    protected $guarded  = ['id'];
}
