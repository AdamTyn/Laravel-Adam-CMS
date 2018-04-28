<?php

namespace App\Models;

use App\Events\AddEvent;
use App\Events\DeleteEvent;
use App\Events\UpdateEvent;
use App\Models\Content;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table    = 'employees';
    public $timestamps  = false;
    protected $fillable = ['name', 'detail'];
    protected $guarded  = ['id'];

    public static function getEmployees(bool $type = false, array $expect = [])
    {
        $tmp = self::all();
        $a   = [];
        foreach ($tmp as $value) {
            $a[$value->name] = $value->getDetail($expect);
        }
        $tmp = null;
        if ($type) {
            $temp_1 = count($a) % 3;
            // 招聘数量是3的倍数
            if ($temp_1 == 0) {
                unset($temp_1);
                return $a;
            }
            // 招聘数量不是3的倍数，缩短
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
    public static function updatePage(array $employees)
    {
        $employee = self::find(1);
        $temp     = Detail::find(intval($employee->detail));
        if (!empty($employees['top-img']) && $employees['top-img'] != '') {
            $file = realpath(public_path()) . '/' . $temp->detail;
            if (!unlink($file)) {
                return false;
            }
            $temp->detail = $employees['top-img'];
        }
        $temp->save();

        $employee     = self::find(2);
        $temp         = Detail::find(intval($employee->detail));
        $temp->detail = $employees['top-text'];
        $temp->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'Employee', 'name' => StrShort($employees['top-text'], 50), 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $employee = $temp = $ups = $info = null;
        return true;
    }
    public static function addEmployee(array $request)
    {
        $title         = Detail::create(['detail' => '']);
        $content       = Detail::create(['detail' => '']);
        $picture       = Detail::create(['detail' => '']);
        $temp          = Content::create(['title' => 1, 'detail' => '', 'picture' => 1]);
        $temp->title   = $title->id;
        $temp->detail  = strval($content->id);
        $temp->picture = $picture->id;
        $temp->save();

        $employee     = self::find(3);
        $temp->detail = $temp->detail . strval($temp->id) . ',';
        $employee->save();

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
        $inserts = ['type' => 'Employee', 'name' => $request['title'] ?? $title->detail, 'user' => $info['name']];
        event(new AddEvent($inserts));

        $title = $content = $picture = $temp = $employee = $info = $inserts = null;
        return true;
    }
    public static function updateEmployee(array $request, $id)
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
        $ups  = ['type' => 'Employee', 'name' => $request['title'] ?? $title->detail, 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $title = $content = $picture = $temp = $file = $ups = $info = null;
        return true;
    }
    public static function deleteEmployee($id)
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
        $dels = ['type' => 'Employee', 'name' => $title->detail, 'user' => $info['name']];
        event(new DeleteEvent($dels));

        $title = $content = $contents = $picture = $temp = $info = $dels = null;
        return true;
    }
}
