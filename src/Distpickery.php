<?php

namespace Laext\Distpickery;

use Encore\Admin\Form\Field;
use Illuminate\Support\Arr;

class Distpickery extends Field
{
    /**
     * @var string
     */
    protected $view = 'laext-distpickery::distpickery';

    /**
     * @var array
     */
    protected static $js = [
        'vendor/laext/distpickery/dist/distpicker.min.js'
    ];
	
    /**
     * @var array
     */
    protected $columnKeys = ['province', 'city', 'district'];

    /**
     * @var array
     */
    protected $placeholder = [];

    /**
     * Distpicker constructor.
     *
     * @param array $column
     * @param array $arguments
     */
    public function __construct($column, $arguments)
    {
        if (!Arr::isAssoc($column)) {
            $this->column = array_combine($this->columnKeys, $column);
        } else {
            $this->column      = array_combine($this->columnKeys, array_keys($column));
            $this->placeholder = array_combine($this->columnKeys, $column);
        }

        $this->label = empty($arguments) ? '地区选择' : current($arguments);
    }

    /**
     * @param int $count
     * @return $this
     */
    public function autoselect($count = 0)
    {
        return $this->attribute('data-autoselect', $count);
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $province = old($this->column['province'], array_get($this->value, 'province')) ?: array_get($this->placeholder, 'province');
        $city     = old($this->column['city'],     array_get($this->value, 'city'))     ?: array_get($this->placeholder, 'city');
        $district = old($this->column['district'], array_get($this->value, 'district')) ?: array_get($this->placeholder, 'district');

        $id = 'distpicker-' . uniqid();

        $this->script = <<<EOT
$("#{$id}").distpicker({
  province: '$province',
  city: '$city',
  district: '$district'
});
$("#{$id} select").select2({"allowClear":true});
EOT;

        return parent::render()->with(compact('id'));
    }
}