<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('text','form.text',['name','value'=>null,'attributes'=>[],'class'=>'form-control']);
        Form::component('textarea','form.textarea',['name','value'=>null,'attributes'=>[]]);
        Form::component('amount','form.amount',['name','value'=>null,'attributes'=>[]]);
        Form::component('description','form.quantity',['name','value'=>null,'attributes'=>[]]);
        Form::component('hidden','form.hidden',['name','value'=>null,'attributes'=>[]]);
        Form::component('file','form.file',['name','attributes'=>[]]);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
