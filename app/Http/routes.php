<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//页面路由

Route::get('',[
    'uses' => 'gestboard@index'
]);

Route::get('index',[
    'uses' => 'gestboard@index'
]);




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //使用到session
    //user界面
    Route::match(['get','post'],'user',[
        'uses' => 'gestboard@user'
    ]);

    //login界面
    Route::match(['get','post'],'login',[
        'uses' => 'gestboard@login'
    ]);

    //logout界面
    Route::get('logout',[
        'uses' => 'gestboard@logout'
    ]);

    //send函数
    Route::post('user/send',[
        'uses' => 'gestboard@send'
    ]);


    Route::match(['get','post'],'register',[
        'uses' => 'gestboard@register'
    ]);

});
