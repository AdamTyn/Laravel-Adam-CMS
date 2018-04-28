<?php

namespace App\Models;

use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table    = 'contents';
    public $timestamps  = false;
    protected $fillable = ['title', 'detail', 'picture'];
    protected $guarded  = ['id'];

    public function getDetail(array $expect = [])
    {
        $total  = ['id','title', 'detail', 'picture', 'last_change'];
        $temp   = array_diff($total, $expect);

        $result = [];
        $tmp         = Detail::find($this->title);

        foreach ($temp as $value) {
            switch ($value) {
                case 'id':
                    $result['id']=$this->id;
                    break;
                case 'title':
                    $result['title']=$tmp->detail ?? '';
                    break;
                case 'last_change':
                    $result['last_change']= $tmp->last_change ?? '';
                    break;
                case 'detail':
                    $tmp         = Detail::find(intval($this->detail));
                    $result['detail']= $tmp->detail ?? '';
                    break;
                case 'picture':
                    $tmp         = Detail::find($this->picture);
                    $result['picture']= $tmp->detail ?? '';
                    break;
                default:
                    break;
            }
        }
        $tmp    = null;
        return $result;
    }
}
