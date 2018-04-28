<?php

namespace App\Listeners;

use App\Events\UpdateEvent;
use App\Models\Log;

class UpdateListener
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
     * @param  UpdateEvent  $event
     * @return void
     */
    public function handle(UpdateEvent $event)
    {
        $time    = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $ups     = $event->ups;
        $content = '';
        switch ($ups['type']) {
            case 'Url':
                $content = '更新友链Logo: ' . $ups['name'];
                break;
            case 'Employee':
                $content = '更新招聘信息: ' . $ups['name'];
                break;
            case 'News':
                $content = '更新动态: ' . $ups['name'];
                break;
            case 'Work':
                $content = '更新案例: ' . $ups['name'];
                break;
            case 'Service':
                $content = '更新服务内容: ' . $ups['name'];
                break;
            case 'About':
                $content = '更新关于信息: ' . $ups['name'];
                break;
            case 'Contact':
                $content = '更新联系信息: ' . $ups['name'];
                break;
            case 'User':
                $content = '更新管理员信息: ' . $ups['name'];
                break;
            case 'home':
                $content = '更新主页内容';
                break;
            default:
                return false;
        }
        Log::create([
            'content' => $content,
            'time'    => $time,
            'user'    => $ups['user'],
        ]);
        return false;
    }
}
