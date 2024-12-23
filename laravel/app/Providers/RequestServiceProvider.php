<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services;

class RequestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ItemRequestService::class,function(){
            return new ItemRequestService(new AddItemRequestService(), new ModifyItemRequestService(),
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
