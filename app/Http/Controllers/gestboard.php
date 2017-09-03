<?php

namespace App\Http\Controllers;

use App\checkdate;
use App\db;
use App\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class gestboard extends Controller
{
    //显示主页
    public function index()
    {
        return view('gestboard.index');
    }

    //登录页面及登录
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {

            $date = $request->input('user');

            //检查数据合法性
            checkdate::name($date['name']);
            checkdate::passwd($date['passwd']);

            if (( !Session::has('error'))) {

                if (db::where(['name' => $date['name'], 'passwd' => md5( $date['passwd'].'wall' )])
                    ->count()
                ) {
                    Session::put('name', $date['name']);

                    return redirect('user');
                } else {
                    return redirect()->back()->with('error', '用户名或密码错误!')->withInput();
                }
            } else {
                return redirect()->back()->withInput();
            }
        }

        return view('gestboard.login');
    }

    //注册页面及注册
    public function register(Request $request)
    {
        if ($request->isMethod('POST')) {

            $date = $request->input('user');

            checkdate::name($date['name']);
            checkdate::passwd($date['passwd']);

            if (( !Session::has('error'))) {
                if (db::where('name', $date['name'])->count()) {
                    return redirect()->back()->with('error', '该用户名已被注册!');
                } else {
                    $date['passwd'] = md5( $date['passwd'].'wall' );
                    if (db::create($date)) {
                        return redirect('login')->with('success', '注册成功')->withInput();
                    } else {
                        return redirect()->back()->with('error', '数据库链接失败!');
                    }
                }
            } else {
                return redirect()->back()->withInput();
            }
        }

        return view('gestboard.register');
    }

    //显示用户页面
    public function user()
    {
        if (Session::has('name')) {
            $user = Session::get('name');

            $messages = message::where('to', $user)->paginate(5);
            return view('gestboard.user', [
                'messages' => $messages,
                'user' => $user
            ]);
        } else {
            return redirect('login');
        }
    }

    //退出登录
    public function logout()
    {
        Session::flush();
        return redirect('index');
    }

    //发送留言
    public function send(Request $request)
    {
        if ($request->isMethod('POST')) {

            $date = $request->input('send');
            $date['from'] = Session::get('name');
            $date['time'] = date('Y-m-d H:i:s', time());

            checkdate::name($date['from']);
            checkdate::name($date['to']);
            checkdate::words($date['words']);

            if ((!Session::has('error'))) {

                if (db::where('name', $date['to'])->count()) {

                    if (message::create($date)) {
                        return redirect()->back()->with('success', '发送成功!');
                    } else {
                        return redirect()->back()->with('error', '发送失败!')->withInput();
                    }
                } else {
                    return redirect()->back()->with('error', '不存在该用户!')->withInput();
                }
            } else{
                return redirect()->back()->withInput();
            }
        }
    }


}