<?php

namespace App;

class checkdate
{
    static public function name($date)
    {
        $rules = '/^[A-Za-z0-9]{4,16}+$/';
        if ($date == '')
        {
            return redirect()->back()->with('error','请输入用户名');
        }else if (!preg_match($rules,$date)) {
            return redirect()->back()->with('error','用户名只允许4-16位数字和字母')
                ->withInput();
        } else{
        }

    }

    static public function passwd($date)
    {
        $rules = '/^[A-Za-z0-9]{4,16}+$/';
        if ($date == '') {
            return redirect()->back()->with('error', '请输入密码');
        } else if (!preg_match($rules, $date)) {
            return redirect()->back()->with('error', '密码只允许4-16位数字和字母')
                ->withInput();
        } else{
        }
    }
    static public function words($date)
    {
        if ($date == '') {
            return redirect()->back()->with('error', '请输入留言');
        } else if ( strlen($date) > 1000) {
            return redirect()->back()->with('error', '字数超过限制');
        } else{
        }
    }

}