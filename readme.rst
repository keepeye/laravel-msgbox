
.. _简体中文: readme_cn.rst

简体中文_

=====================
Laravel Message Box
=====================
A package for Laravel 4.2 that allow you display pretty message page and can auto jump to the referer url or what you specified.

Example::

    <?php
    //this a test route
    Route::get("/test",function(){
        return Msgbox::success('success tips..');
        //return Msgbox::error('error tips...');
        //return Msgbox::info('infomation...');
    });

Preview:

.. image:: https://cloud.githubusercontent.com/assets/3785561/5561150/1685fc74-8dfc-11e4-9049-9227c684be88.png

.. image:: https://cloud.githubusercontent.com/assets/3785561/5561151/171af3d8-8dfc-11e4-8c79-4a67fb09314c.png

.. image:: https://cloud.githubusercontent.com/assets/3785561/5561152/174530a8-8dfc-11e4-9fb4-ef13a8b139c9.png

===============
Installnation
===============
Requirements::

    php: >=5.4.0
    laravel: v4.2

Step1::

    composer require keepeye/laravel-msgbox:1.0.* --prefer-source

Step2: Add the service provider to ``app/config/app.php`` ::

    'Keepeye\LaravelMsgbox\LaravelMsgboxServiceProvider',

Step3: Setup the aliases in ``app/config/app.php`` ::

    'Msgbox' => 'Keepeye\LaravelMsgbox\LaravelMsgboxFacade'

Step4: Optional configuration ::

    php artisan config:publish keepeye/laravel-msgbox
    php artisan view:publish keepeye/laravel-msgbox

So,you can modify configuration parameter in ``app/config/packages/keepeye/laravel-msgbox/config.php`` ,
and the view in ``app/views/packages/keepeye/laravel-msgbox/msg.php``.





================
Usage
================
In your controller method,when you want to show a message you can return like::

    //by default,the page will auto jump to the $_SERVER['HTTP_REFERER']
    return Msgbox::info("info text...");
    //or you can specify the url ,for example:
    return Msgbox::info("info text...",URL::get('/login'));
    //you can specify the time like :
    return Msgbox::info("info text...",null,5);//after 5 second,it will jump to the referer url

The default time is based on the ``default_timeout`` defined in the package config file.
If you don't want to jump auto,just set the third method param to **0** ,or set the config param ``auto_jump`` to ``false``.
In addition to this method and two other methods are almost the same::

    return Msgbox::success('...');
    //and
    return Msgbox::error('...');

