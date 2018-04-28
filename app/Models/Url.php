<?php

namespace App\Models;

use App\Events\AddEvent;
use App\Events\DeleteEvent;
use App\Events\UpdateEvent;
use App\Models\Content;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table    = 'urls';
    public $timestamps  = false;
    protected $fillable = ['detail'];
    protected $guarded  = ['id'];

    public static function getUrls(bool $type = false, array $expect = [])
    {
        $tmp = Url::all();
        $a   = [];
        foreach ($tmp as $value) {
            $a[] = $value->getDetail($expect);
        }
        $tmp = null;
        if ($type) {
            $temp_1 = count($a) % 8;
            // logo数量是8的倍数
            if ($temp_1 == 0) {
                unset($temp_1);
                return $a;
            }
            // logo数量不是8的倍数，缩短
            return array_slice($a, 0, $temp_1 * 8);
        }
        return $a;
    }
    public function getDetail(array $expect = [])
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
                $c[] = $value->getDetail($expect);
            }
            $a = null;
            $b = null;
            return $c;
        }
        $tmp = Detail::find(intval($this->detail));
        return $tmp->detail;
    }
    public static function addUrl(array $request)
    {
        $title         = Detail::create(['detail' => '']);
        $picture       = Detail::create(['detail' => '']);
        $temp          = Content::create(['title' => 1, 'detail' => '', 'picture' => 1]);
        $temp->title   = $title->id;
        $temp->picture = $picture->id;
        $temp->save();

        $url = self::create(['detail' => strval($temp->id) . ',']);
        $url->save();

        $title->detail        = $request['title'] ?? $title->detail;
        $picture->detail      = $request['picture'] ?? $picture->detail;
        $title->last_change   = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $picture->last_change = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $title->save();
        $picture->save();

        $info    = json_decode(session('user'), true);
        $inserts = ['type' => 'Url', 'name' => $request['title'] ?? $title->detail, 'user' => $info['name']];
        event(new AddEvent($inserts));

        $title = $picture = $temp = $url = $info = $inserts = null;
        return true;
    }
    public static function updateUrl(array $request, $id)
    {
        $temp          = Content::find(intval($id));
        $title         = Detail::find(intval($temp->title));
        $picture       = Detail::find(intval($temp->picture));
        $title->detail = $request['title'] ?? $title->detail;
        if (!empty($request['picture'])) {
            $file = realpath(public_path()) . '/' . $picture->detail;
            if (!unlink($file)) {
                return false;
            }
            $picture->detail = $request['picture'];
            $file            = null;
        }
        $title->last_change   = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $picture->last_change = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $title->save();
        $picture->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'Url', 'name' => $request['title'] ?? $title->detail, 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $title = $picture = $temp = $ups = $info = null;
        return true;
    }
    public static function deleteUrl($id, $uid)
    {
        $temp    = Content::find($id);
        $title   = Detail::find(intval($temp->title));
        $picture = Detail::find(intval($temp->picture));
        $title->delete();
        $picture->delete();
        $temp->delete();
        $temp1 = self::find($uid);
        $temp1->delete();

        $info = json_decode(session('user'), true);
        $dels = ['type' => 'Url', 'name' => $title->detail, 'user' => $info['name']];
        event(new DeleteEvent($dels));

        $title = $picture = $temp = $temp1 = $info = $dels = null;
        return true;
    }
}
