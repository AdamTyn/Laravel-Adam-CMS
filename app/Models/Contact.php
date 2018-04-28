<?php

namespace App\Models;

use App\Events\UpdateEvent;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table    = 'contacts';
    public $timestamps  = false;
    protected $fillable = ['name', 'detail'];
    protected $guarded  = ['id'];

    public static function getContacts()
    {
        $tmp = self::all();
        $a   = [];
        foreach ($tmp as $value) {
            $a[$value->name] = $value->getDetail();
        }
        $tmp = null;
        return $a;
    }
    public function getDetail()
    {
        $tmp = Detail::find(intval($this->detail));
        return $tmp->detail;
    }
    public static function updatePage(array $contacts)
    {
        $contact = self::find(1);
        $temp    = Detail::find(intval($contact->detail));
        if (!empty($contacts['top-img']) && $contacts['top-img'] != '') {
            $file = realpath(public_path()) . '/' . $temp->detail;
            if (!unlink($file)) {
                return false;
            }
            $temp->detail = $contacts['top-img'];
        }
        $temp->save();

        $contact      = self::find(2);
        $temp         = Detail::find(intval($contact->detail));
        $temp->detail = $contacts['top-text'];
        $temp->save();

        $info = json_decode(session('user'), true);
        $ups  = ['type' => 'Contact', 'name' => StrShort($contacts['top-text'], 50), 'user' => $info['name']];
        event(new UpdateEvent($ups));

        $contact = $temp = $ups = $info = null;
        return true;
    }
}
