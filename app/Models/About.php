<?php

namespace App\Models;

use App\Events\UpdateEvent;
use App\Models\Content;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table    = 'abouts';
    public $timestamps  = false;
    protected $fillable = ['name', 'detail'];
    protected $guarded  = ['id'];

    public static function getAbouts()
    {
        $tmp = About::all();
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
                if ($value == null) {
                    continue;
                }
                $b[] = Content::find(intval($value));
            }
            $c = [];
            foreach ($b as $value) {
                if ($value == null) {
                    continue;
                }
                $c[] = $value->getDetail();
            }
            $a = null;
            $b = null;
            return $c;
        }
        $tmp = Detail::find(intval($this->detail));
        return $tmp->detail;
    }
    public static function updatePage(array $abouts)
    {
        $about = self::find(1);
        $temp  = Detail::find(intval($about->detail));
        if (!empty($abouts['top-img']) && $abouts['top-img'] != '') {
            $file = realpath(public_path()) . '/' . $temp->detail;
            if (!unlink($file)) {
                return false;
            }
            $temp->detail = $abouts['top-img'];
        }
        $temp->save();

        $about        = self::find(2);
        $temp         = Detail::find(intval($about->detail));
        $temp->detail = $abouts['top-text'];
        $temp->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'Contact', 'name' => StrShort($abouts['top-text'], 50), 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $about = $temp = $ups = $info = null;
        return true;
    }
}
