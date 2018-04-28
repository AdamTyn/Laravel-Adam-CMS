<?php

namespace App\Models;

use App\Events\AddEvent;
use App\Events\DeleteEvent;
use App\Events\UpdateEvent;
use App\Models\Content;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table    = 'news';
    public $timestamps  = false;
    protected $fillable = ['name', 'detail'];
    protected $guarded  = ['id'];

    public static function getNews(array $expect = [])
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
    public static function updatePage(array $news)
    {
        $new  = self::find(1);
        $temp = Detail::find(intval($new->detail));
        if (!empty($news['top-img']) && $news['top-img'] != '') {
            $file = realpath(public_path()) . '/' . $temp->detail;
            if (!unlink($file)) {
                return false;
            }
            $temp->detail = $news['top-img'];
        }
        $temp->save();

        $new          = self::find(2);
        $temp         = Detail::find(intval($new->detail));
        $temp->detail = $news['top-text'] ?? $temp->detail;
        $temp->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'News', 'name' => StrShort($news['top-text'], 50), 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $new = $temp = $ups = $info = null;
        return true;
    }
    public static function addNews(array $request)
    {
        $title         = Detail::create(['detail' => '']);
        $content       = Detail::create(['detail' => '']);
        $picture       = Detail::create(['detail' => '']);
        $temp          = Content::create(['title' => 1, 'detail' => '', 'picture' => 1]);
        $temp->title   = $title->id;
        $temp->detail  = strval($content->id);
        $temp->picture = $picture->id;
        $temp->save();

        $news         = self::find(3);
        $temp->detail = $temp->detail . strval($temp->id) . ',';
        $news->save();

        $title->detail        = $request['title'] ?? $title->detail;
        $content->detail      = TextareaTo($request['content']);
        $picture->detail      = $request['picture'] ?? $picture->detail;
        $title->last_change   = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $content->last_change = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $picture->last_change = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $title->save();
        $content->save();
        $picture->save();

        $info    = json_decode(session('user'), true);
        $inserts = ['type' => 'News', 'name' => $request['title'] ?? $title->detail, 'user' => $info['name']];
        event(new AddEvent($inserts));

        $title = $content = $picture = $temp = $news = $info = $inserts = null;
        return true;
    }
    public static function updateNews(array $request, $id)
    {
        $temp            = Content::find(intval($id));
        $title           = Detail::find(intval($temp->title));
        $content         = Detail::find(intval($temp->detail));
        $picture         = Detail::find(intval($temp->picture));
        $title->detail   = $request['title'] ?? $title->detail;
        $content->detail = TextareaTo($request['content']);
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
        $ups  = ['type' => 'News', 'name' => $request['title'] ?? $title->detail, 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $title = $content = $picture = $temp = $file = $info = $ups = null;
        return true;
    }
    public static function deleteNews($id)
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
        $dels = ['type' => 'News', 'name' => $title->detail, 'user' => $info['name']];
        event(new DeleteEvent($dels));

        $title = $content = $contents = $picture = $temp = $info = $dels = null;
        return true;
    }
}
