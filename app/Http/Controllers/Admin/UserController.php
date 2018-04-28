<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Events\AddEvent;
use App\Events\UpdateEvent;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function list() {
        $users = User::all()->toArray();
        return view('mains.admins.users.list')->with(compact('users'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function add()
    {
        return view('mains.admins.users.add');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function update($id)
    {
        $info      = json_decode(session('user'),true);
        $errors    = [
            'title'   => '不能修改',
            'content' => '只有Super管理员才能修改此类信息',
            'status'  => 0,
        ];
        if (!isset($info)) {
            $info  = null;
            return back()->with(compact('errors'));
        } elseif ($info['role'] != 1) {
            $info  = null;
            return back()->with(compact('errors'));
        } else {
            $user = User::find($id);
            return view('mains.admins.users.update')->with('user', ['id' => $id, 'name' => $user->name, 'email' => $user->email]);
        }
    }

    public function userInsert(Request $request)
    {
        $errors = [
            'title'   => '不能修改',
            'content' => '只有Super管理员才能添加管理员',
            'status'  => 0,
        ];
        $info      = json_decode(session('user'),true);
        if (!isset($info)) {
            $info  = null;
            return back()->with(compact('errors'));
        }
        if ($info['role'] != 1) {
            $info  = null;
            return back()->with(compact('errors'));
        }
        if ((!empty($request->get('password'))) && (!empty($request->get('name'))) && (!empty($request->get('email'))) && (!empty($request->get('password-2')))) {
            if ($request->get('password') == $request->get('password-2')) {
                $name  = $request->get('name');
                $email = $request->get('email');
                $pass  = $request->get('password');
                User::create([
                    'name'     => $name,
                    'email'    => $email,
                    'password' => Hash::make($pass),
                ]);
                $errors = [
                    'title'   => '添加成功',
                    'content' => '管理员:'.$name.'添加成功',
                    'status'  => 1,
                ];
                $inserts=['type'=>'User','name'=>$name,'user'=>$info['name']];
                event(new AddEvent($inserts));
                unset($name);
                unset($email);
                unset($pass);
                return back()->with(compact('errors'));
            } else {
                $errors = [
                    'title'   => '添加失败',
                    'content' => '两次密码不一样',
                    'status'  => 0,
                ];
                return back()->with(compact('errors'));
            }
        } else {
            $errors = [
                'title'   => '添加失败',
                'content' => '用户名或密码不能为空',
                'status'  => 0,
            ];
            return back()->with(compact('errors'));
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function userUpdate(Request $request, $id)
    {
        $errors = [
            'title'   => '不能修改',
            'content' => '只有Super管理员才能添加管理员',
            'status'  => 0,
        ];
        $info      = json_decode(session('user'),true);
        if (!isset($info)) {
            $info  = null;
            return back()->with(compact('errors'));
        }
        if ($info['role'] != 1) {
            $info  = null;
            return back()->with(compact('errors'));
        }
        if ((!empty($request->get('password'))) && (!empty($request->get('name'))) && (!empty($request->get('email'))) && (!empty($request->get('password-2')))) {
            if ($request->get('password') == $request->get('password-2')) {
                $user           = User::find($id);
                $name           = $request->get('name');
                $email          = $request->get('email');
                $pass           = $request->get('password');
                $user->name     = $name;
                $user->email    = $email;
                $user->password = Hash::make($pass);
                $user->save();
                $errors = [
                    'title'   => '修改成功',
                    'content' => '管理员:'.$name.'修改成功',
                    'status'  => 1,
                ];
                $ups=['type'=>'User','name'=>$name,'user'=>$info['name']];
                event(new UpdateEvent($ups));
                unset($name);
                unset($email);
                unset($pass);
                return back()->with(compact('errors'));
            } else {
                $errors = [
                    'title'   => '修改失败',
                    'content' => '两次密码不一样',
                    'status'  => 0,
                ];
                return back()->with(compact('errors'));
            }
        } else {
            $errors = [
                'title'   => '修改失败',
                'content' => '请填写完整表单',
                'status'  => 0,
            ];
            return back()->with(compact('errors'));
        }
    }
}
