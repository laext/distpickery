<?php

namespace Laext\Distpickery;

use Encore\Admin\Extension;

class DistpickeryExtension extends Extension
{
    public $name = 'distpickery';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';
}