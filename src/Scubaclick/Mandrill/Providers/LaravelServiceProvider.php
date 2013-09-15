<?php namespace Scubaclick\Mandrill\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('scubaclick/mandrill', null, __DIR__ .'/../../..');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['mandrill'] = $this->app->share(function($app) {
			$password  = $app['config']->get('mail.password');
			$fromName  = $app['config']->get('mail.from.name');
			$fromEmail = $app['config']->get('mail.from.email');
			$class     = $app['config']->get('mandrill::class');

            return new $class($password, $fromName, $fromEmail);
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('mandrill');
	}
}
