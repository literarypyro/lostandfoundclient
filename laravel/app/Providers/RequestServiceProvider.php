<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RequestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RequestService::class,function(){
            return new RequestService(new ItemRequestService(),
            new AddItemRequestService(), new ModifyItemRequestService(),
            new AddRequestStatusService(), new AddMessageService(),new MessageService());
        }          
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
