<?php

namespace App\Models;

use App\Events\UpdateEvent;
use App\Models\Content;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table    = 'services';
    public $timestamps  = false;
    protected $fillable = ['name', 'detail'];
    protected $guarded  = ['id'];

    public static function getServices(array $expect = [])
    {
        $tmp = self::all();
        $a   = [];
        foreach ($tmp as $value) {
            $a[$value->name] = $value->getDetail($expect);
        }
        $tmp = null;
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
    public static function updatePage(array $services)
    {
        $service = self::find(1);
        $temp    = Detail::find(intval($service->detail));
        if (!empty($services['top-img']) && $services['top-img'] != '') {
            $file = realpath(public_path()) . '/' . $temp->detail;
            if (!unlink($file)) {
                return false;
            }
            $temp->detail = $services['top-img'];
        }
        $temp->save();

        $service      = self::find(2);
        $temp         = Detail::find(intval($service->detail));
        $temp->detail = $services['top-text'];
        $temp->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'Service', 'name' => StrShort($services['top-text'], 50), 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $service = $temp = $ups = $info = null;
        return true;
    }
    public static function updateNews(array $request, $id)
    {
        $temp            = Content::find(intval($id));
        $title           = Detail::find(intval($temp->title));
        $content         = Detail::find(intval($temp->detail));
        $title->detail   = $request['title'] ?? $title->detail;
        $content->detail = TextareaTo($request['content']);

        $title->last_change   = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $picture->last_change = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $title->save();
        $content->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'Service', 'name' => $request['title'] ?? $title->detail, 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $title = $content = $temp = $file = $info = $ups = null;
        return true;
    }
}
