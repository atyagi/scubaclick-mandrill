<?php namespace ScubaClick\Mandrill\Providers;

use ScubaClick\Mandrill\MandrillClient;
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
			$password     = $app['config']->get('mandrill::password');
			$version      = $app['config']->get('mandrill::version');
			$manifestPath = $app['config']->get('mandrill::manifest_path');

			if(empty($password)) {
				$password = $app['config']->get('mail.password');
			}

            return new MandrillClient($password, $version, $manifestPath);
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
