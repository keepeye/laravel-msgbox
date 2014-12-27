=====================
Laravel Message Box
=====================
A package for Laravel 4.2 that allow you display pretty message page and can auto jump to the referer url or what you specified.

Example::

    <?php
    //this a test route
    Route::get("/test",function(){
        return Msgbox::info('infomation...');
        //return Msgbox::success('success tips..');
        //return Msgbox::error('error tips...');
    });



===============
Installnation
===============
Step1::

    composer require keepeye/laravel-msgbox --prefer-source

Step2: Add the service provider to ``app/config/app.php`` ::

    'Keepeye\LaravelMsgbox\LaravelMsgboxServiceProvider',

Step3: Setup the aliases in ``app/config/app.php`` ::

    'Msgbox' => 'Keepeye\LaravelMsgbox\LaravelMsgboxFacade'

Step4: Optional configuration ::

    php artisan config:publish keepeye/laravel-msgbox
    php artisan view:publish keepeye/laravel-msgbox

So,you can modify configuration parameter in ``app/config/package/msgbox/config.php`` ,
and the view in ``app/views/msgbox/msg.php``.





================
Useage
================

