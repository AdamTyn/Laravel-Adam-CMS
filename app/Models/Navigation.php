<?php

namespace App\Models;

use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table    = 'navigations';
    public $timestamps  = false;
    protected $fillable = ['name', 'redirect'];
    protected $guarded  = ['id'];

    public static function getNavs()
    {
        $tmp = Navigation::all();
        $a   = [];
        foreach ($tmp as $value) {
            $a[$value->getRedirect()] = $value->getName();
        }
        $tmp = null;
        //setcookie('navs', json_encode($a), time() + 360);
        return $a;
    }

    public function getName()
    {
        $tmp = Detail::find(intval($this->name));
        return $tmp->detail;
    }

    public function getRedirect()
    {
        $tmp = Detail::find(intval($this->redirect));
        return $tmp->detail;
    }
}
