<?php

namespace App\Listeners;

use App\Events\DeleteEvent;
use App\Models\Log;

class DeleteListener
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
     * @param  DeleteEvent  $event
     * @return void
     */
    public function handle(DeleteEvent $event)
    {
        $time=date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
        $dels=$event->dels;
        $content='';
        switch ($dels['type']) {
            case 'Url':
                $content='删除友链Logo:'.$dels['name'];
                break;
            case 'Employee':
                $content='删除招聘信息:'.$dels['name'];
                break;
            case 'News':
                $content='删除动态:'.$dels['name'];
                break;
            case 'Work':
                $content='删除案例:'.$dels['name'];
                break;
            case 'Service':
                $content='删除服务内容:'.$dels['name'];
                break;
            case 'About':
                $content='删除关于信息:'.$dels['name'];
                break;
            case 'Contact':
                $content='删除联系信息:'.$dels['name'];
                break;
            case 'User':
                $content='删除子管理员:'.$dels['name'];
                break;
            default:
                return false;
        }
        Log::create([
            'content'=>$content,
            'time'=>$time,
            'user'=>$dels['user']
        ]);
        return false;
    }
}
