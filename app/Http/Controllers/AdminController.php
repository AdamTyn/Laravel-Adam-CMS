<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Events\UserEvent;

class AdminController extends Controller
{
    /**
     * Show the login page.
     *
     * @return View
     */
    public function login()
    {
        return view('mains.login');
    }
    /**
     * Logout system
     *
     * @param \Illuminate\Http\Request $request, $id
     * @return Redirect
     */
    public function logout()
    {
        $info      = json_decode(session('user'),true);   
        $time = $_SERVER['REQUEST_TIME'];
        $user = User::find(intval($info['id']));
        if (!empty($user)) {
            $user->status      = 0;
            $user->last_logout = date('Y-m-d H:i:s', $time);
            $user->save();
        }
        session(['user'=> null]);
        event(new UserEvent(['name'=>$info['name'],'type'=>'退出后台']));
        return redirect('login');
    }
    /**
     * Check the login
     *
     * @param \Illuminate\Http\Request $request
     * @return View
     */
    public function checkLogin(Request $request)
    {
        $errors = [
            'title'   => '登录失败',
            'content' => '用户名或密码不能为空',
            'status'=>0
        ];
        if (!$request->has('name') || !$request->has('password')) {
            return back()->with(compact('errors'));
        }

        $name     = $request->get('name');
        $password = $request->get('password');
        $user     = User::where('name', '=', $name)->first();
        $errors   = [
            'title'   => '登录失败',
            'content' => '用户名或密码错误',
            'status'=>0
        ];

        if (!empty($user)) {
            $time = $_SERVER['REQUEST_TIME'];
            if (Hash::check($password, $user->password)) {
                $user->last_ip     = $request->ip();
                $user->last_login  = date('Y-m-d H:i:s', $time);
                $user->last_logout = date('Y-m-d H:i:s', $time);
                $user->status      = 1;
                $user->save();
                $info=[
                    'id'=>$user->id,
                    'name'=>$user->name,
                    'role'=>$user->role,
                ];
                session(['user'=>json_encode($info)]);
                event(new UserEvent(['name'=>$user->name,'type'=>'登录后台']));
                return redirect('admin');
            } else {
                $user->status = 0;
                $user->save();
                return back()->with(compact('errors'));
            }
        } else {
            return back()->with(compact('errors'));
        }
    }
    /**
     * Show the administrator-system.
     *
     * @return View
     */
    public function index()
    {
        return view('mains.admins.index');
    }

}
