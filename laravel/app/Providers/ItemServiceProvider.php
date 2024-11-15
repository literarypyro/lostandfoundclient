<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ItemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ItemService::class,function(){
            return new ItemService(new DeleteItemService(), new AddItemService(),
            new AddItemStatusService(), new ModifyItemService(),new ModifyEntryService(),
            new LocationService());
        }          
        );


        //
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
