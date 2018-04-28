<?php

namespace App\Listeners;

use App\Events\AddEvent;
use App\Models\Log;

class AddListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddEvent  $event
     * @return void
     */
    public function handle(AddEvent $event)
    {
        $time=date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
        $inserts=$event->inserts;
        $content='';
        switch ($inserts['type']) {
            case 'Url':
                $content='添加友链Logo:'.$inserts['name'];
                break;
            case 'Employee':
                $content='添加招聘信息:'.$inserts['name'];
                break;
            case 'News':
                $content='添加动态:'.$inserts['name'];
                break;
            case 'Work':
                $content='添加案例:'.$inserts['name'];
                break;
            case 'Service':
                $content='添加服务内容:'.$inserts['name'];
                break;
            case 'About':
                $content='添加关于信息:'.$inserts['name'];
                break;
            case 'Contact':
                $content='添加联系信息:'.$inserts['name'];
                break;
            case 'User':
                $content='添加子管理员:'.$inserts['name'];
                break;
            default:
                return false;
        }
        Log::create([
            'content'=>$content,
            'time'=>$time,
            'user'=>$inserts['user']
        ]);
        return false;
    }
}
