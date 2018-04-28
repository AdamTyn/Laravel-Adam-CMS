<?php

namespace App\Models;

use App\Events\UpdateEvent;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table    = 'homes';
    public $timestamps  = false;
    protected $fillable = ['name', 'detail'];
    protected $guarded  = ['id'];

    public static function getHomes()
    {
        $tmp = Home::all();
        $a   = [];
        foreach ($tmp as $value) {
            $a[$value->name] = $value->getDetail();
        }
        $tmp = null;
        return $a;
    }
    public function getDetail()
    {
        $a = explode(',', $this->detail);
        if (count($a) > 1) {
            $b = [];
            foreach ($a as $value) {
                $tmp = Detail::find(intval($value));
                $b[] = $tmp->detail;
            }
            $tmp = null;
            return $b;
        }
        $tmp = Detail::find(intval($this->detail));
        return $tmp->detail;
    }
    public static function updatePage(array $homes)
    {
        $home         = Home::find(1);
        $temp         = Detail::find(intval($home->detail));
        $temp->detail = $homes['top-img'];
        $temp->save();

        $home    = Home::find(2);
        $details = explode(',', $home->detail);

        $temp         = Detail::find(intval($details[0]));
        $temp->detail = $homes['top-title'];
        $temp->save();

        $temp         = Detail::find(intval($details[1]));
        $temp->detail = $homes['top-text'];
        $temp->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'Home', 'name' => '', 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $home = $details = $info = $ups = null;
        return true;
    }
}
