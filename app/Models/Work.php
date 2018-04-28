<?php

namespace App\Models;

use App\Events\AddEvent;
use App\Events\DeleteEvent;
use App\Events\UpdateEvent;
use App\Models\Content;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table    = 'works';
    public $timestamps  = false;
    protected $fillable = ['name', 'detail'];
    protected $guarded  = ['id'];

    public static function getWorks(bool $type = false, array $expect = [])
    {
        $tmp = self::all();
        $a   = [];
        foreach ($tmp as $value) {
            $a[$value->name] = $value->getDetail($expect);
        }
        $tmp = null;
        if ($type) {
            $temp_1 = count($a) % 3;
            // 案例数量是3的倍数
            if ($temp_1 == 0) {
                unset($temp_1);
                return $a;
            }
            // 案例数量不是3的倍数，缩短
            return array_slice($a, 0, $temp_1 * 3);
        }
        return $a;
    }
    public function getDetail(array $expect = [])
    {
        if ($this->detail == null) {
            return [];
        }
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
    public static function updatePage(array $works)
    {
        $work = self::find(1);
        $temp = Detail::find(intval($work->detail));
        if (!empty($works['top-img']) && $works['top-img'] != '') {
            $file = realpath(public_path()) . '/' . $temp->detail;
            if (!unlink($file)) {
                return false;
            }
            $temp->detail = $works['top-img'];
        }
        $temp->save();

        $work         = self::find(2);
        $temp         = Detail::find(intval($work->detail));
        $temp->detail = $works['top-text'];
        $temp->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'Work', 'name' => StrShort($works['top-text'], 50), 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $work = $temp = $ups = $info = null;
        return true;
    }
    public static function addWork(array $request)
    {
        $title         = Detail::create(['detail' => '']);
        $content       = Detail::create(['detail' => '']);
        $picture       = Detail::create(['detail' => '']);
        $temp          = Content::create(['title' => 1, 'detail' => '', 'picture' => 1]);
        $temp->title   = $title->id;
        $temp->detail  = strval($content->id);
        $temp->picture = $picture->id;
        $temp->save();

        $work         = self::find(3);
        $temp->detail = $temp->detail . strval($temp->id) . ',';
        $work->save();

        $title->detail        = $request['title'] ?? $title->detail;
        $content->detail      = '<p>' . $request['content'] . '</p>';
        $picture->detail      = $request['picture'] ?? $picture->detail;
        $title->last_change   = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $content->last_change = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $picture->last_change = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $title->save();
        $content->save();
        $picture->save();

        $info    = json_decode(session('user'), true);
        $inserts = ['type' => 'Work', 'name' => $request['title'] ?? $title->detail, 'user' => $info['name']];
        event(new AddEvent($inserts));

        $title = $content = $picture = $temp = $work = $info = $inserts = null;
        return true;
    }
    public static function updateWork(array $request, $id)
    {
        $temp            = Content::find(intval($id));
        $title           = Detail::find(intval($temp->title));
        $content         = Detail::find(intval($temp->detail));
        $picture         = Detail::find(intval($temp->picture));
        $title->detail   = $request['title'] ?? $title->detail;
        $content->detail = '<p>' . $request['content'] . '</p>';
        if (!empty($request['picture'])) {
            $file = realpath(public_path()) . '/' . $picture->detail;
            if (!unlink($file)) {
                return false;
            }
            $picture->detail = $request['picture'];
        }
        $title->last_change   = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $content->last_change = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $picture->last_change = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $title->save();
        $content->save();
        $picture->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'Work', 'name' => $request['title'] ?? $title->detail, 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $title = $content = $picture = $temp = $file = $info = $ups = null;
        return true;
    }
    public static function deleteWork($id)
    {
        $temp         = self::find(3);
        $contents     = str_replace($id . ',', '', $temp->detail);
        $temp->detail = $contents;
        $temp->save();
        $temp    = Content::find(intval($id));
        $title   = Detail::find(intval($temp->title));
        $content = Detail::find(intval($temp->detail));
        $picture = Detail::find(intval($temp->picture));
        $title->delete();
        $content->delete();
        $picture->delete();
        $temp->delete();

        $info = json_decode(session('user'), true);
        $dels = ['type' => 'Work', 'name' => $title->detail, 'user' => $info['name']];
        event(new DeleteEvent($dels));

        $title = $content = $contents = $picture = $temp = $info = $dels = null;
        return true;
    }
}
