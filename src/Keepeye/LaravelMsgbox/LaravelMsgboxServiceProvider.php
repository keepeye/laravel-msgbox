<?php namespace Keepeye\LaravelMsgbox;

use Illuminate\Support\ServiceProvider;

class LaravelMsgboxServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

    public function boot()
    {
        $this->package('keepeye/laravel-msgbox', 'msgbox');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        \App::bind('410b4f9d96e93921548c59a451ff1495',function(){
            return new LaravelMsgbox();
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('410b4f9d96e93921548c59a451ff1495');
	}

}
