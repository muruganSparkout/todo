<?php

namespace Murugan\Todo;

use Illuminate\Support\ServiceProvider;

class TodoServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'todo');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->mergeConfigFrom(
            __DIR__.'/config/todo.php', 'todo'
        );       

        $this->publishes([
            __DIR__.'/config/todo.php' => config_path('todo.php'),
            __DIR__.'/database/migrations/' => database_path('migrations'),
            __DIR__.'/views' => base_path('resources/views/todo'),
        ], 'todo');
    
        // $this->publishes([
        //     __DIR__.'/database/migrations/' => database_path('migrations')
        // ], 'migrations');

    }

    public function register(){
        $this->mergeConfigFrom(
            __DIR__.'/config/todo.php', 'todo'
        );
    }


}