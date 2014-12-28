
=====================
Laravel Messsage Box
=====================
适用于Lravel4.2的提示消息页面，带定时自动跳转，可指定跳转页面，适合非法操作提示、表单错误提示等场景。

消息页面有3种，分别为 success页面、error页面、info页面，采用不同的色调展示，可自适应手机屏幕。


使用示例::

    <?php
    //this a test route
    Route::get("/test",function(){
        return Msgbox::success('success tips..');
        //return Msgbox::error('error tips...');
        //return Msgbox::info('infomation...');
    });

预览:

.. image:: https://cloud.githubusercontent.com/assets/3785561/5561150/1685fc74-8dfc-11e4-9049-9227c684be88.png

.. image:: https://cloud.githubusercontent.com/assets/3785561/5561151/171af3d8-8dfc-11e4-8c79-4a67fb09314c.png

.. image:: https://cloud.githubusercontent.com/assets/3785561/5561152/174530a8-8dfc-11e4-9fb4-ef13a8b139c9.png

===============
安装说明
===============
环境要求::

    php: >=5.4.0
    laravel: v4.2

Step1: 进入项目根目录后，执行以下命令

    composer require keepeye/laravel-msgbox:1.0.* --prefer-source

Step2: 在 ``app/config/app.php`` 中注册服务提供器providers::

    'Keepeye\LaravelMsgbox\LaravelMsgboxServiceProvider',

Step3: 在 ``app/config/app.php`` 里注册别名aliases::

    'Msgbox' => 'Keepeye\LaravelMsgbox\LaravelMsgboxFacade'

Step4: 可选的配置 ::

    php artisan config:publish keepeye/laravel-msgbox
    php artisan view:publish keepeye/laravel-msgbox

这样你可以修改包配置 ``app/config/packages/keepeye/laravel-msgbox/config.php`` ,
还有模板 ``app/views/packages/keepeye/laravel-msgbox/msg.php``.





================
用法
================
比如在控制器中，当你想显示一个提示信息页面时，可以这样::

    //默认情况下，提示信息页面在一定时间后会自动跳转到来路url $_SERVER['HTTP_REFERER']
    return Msgbox::info("info text...");
    //或者你可以指定跳转url :
    return Msgbox::info("info text...",URL::get('/login'));
    //你还可以指定跳转时间 :
    return Msgbox::info("info text...",null,5);//5秒后，跳转到来路页面

默认的跳转时间是根据包配置参数 ``default_timeout`` ，如果你想修改该参数，可以参考安装方法中的第4步。

如果你不想让提示信息页面自动跳转,只需要将第3个方法参数指定为 **0** ,或者将包配置参数 ``auto_jump`` 设置为 ``false``.
除了info方法，另外两个方法用法一样::

    return Msgbox::success('...');
    //和
    return Msgbox::error('...');

