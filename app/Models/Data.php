<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    /**
     * Variable
     *
     * @var string
     */
    protected $table = 'datas';

    /**
     * Variable
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Variable
     *
     * @var array
     */
    protected $fillable = ['item','value','time'];

    /**
     * Variable
     *
     * @var array
     */
    protected $guarded = ['id'];
}
