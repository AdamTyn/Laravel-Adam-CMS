<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Log;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function data()
    {
        return view('mains.admins.systems.data');
    }
    public function getData()
    {
        $mobiles   = Data::where('item', '=', 'mobile')->get()->toArray();
        $pcs       = Data::where('item', '=', 'pc')->get()->toArray();
        $dataArray = ['total'=>[], 'mobile'=>[], 'pc'=>[]];
        for ($i = 0; $i < 7; ++$i) {
            $dataArray['mobile'][] = $mobiles[$i]['value'];
            $dataArray['pc'][]     = $pcs[$i]['value'];
            $dataArray['total'][]  = strval($mobiles[$i]['value'] + $pcs[$i]['value']);
        }
        return response()->json($dataArray);
    }
    public function log()
    {
        $logs = Log::all();
        return view('mains.admins.systems.log', compact('logs'));
    }

    public function logDelete($id, Request $request)
    {
        $errors = [
            'title'   => '删除失败',
            'content' => '用户名或密码不能为空',
            'status'  => 0,
        ];
        $log = Log::find($id);
        if ($log->delete()) {
            $errors = [
                'title'   => '删除成功',
                'content' => '选中日志已删除',
                'status'  => 1,
            ];
        }

        return back()->with(compact('errors'));
    }
}
