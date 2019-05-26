<?php

namespace Laext\Distpickery;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class DistpickeryServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(DistpickeryExtension $extension)
    {
        if (! DistpickeryExtension::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laext-distpickery');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laext/distpickery')], 'laext-distpickery'
            );
        }

        Admin::booting(function () {
            Form::extend('distpickery', Distpickery::class);
        });
    }
}