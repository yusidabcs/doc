<?php namespace Yusidabcs\Doc;

use Illuminate\Support\ServiceProvider;

class DocServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
    {
        $this->package('yusidabcs/doc');        
        include __DIR__.'/../../routes.php';
    }
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['doc'] = $this->app->share(function($app)
        {
            return new Doc;
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('doc');
	}

}