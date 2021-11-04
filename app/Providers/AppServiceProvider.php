<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function(){
            $client = new ApiClient();
            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server-prefix')
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //Paginator::useBootstrap();

        Model::unguard();


        Gate::define('admin', function(User $user){
            return $user->username === 'natacha-belboom';
        });
    }
}
