<?php
namespace App\Forms\Admin;

use App\Setting;
use Kris\LaravelFormBuilder\Form;

class SettingForm extends Form
{
    public function buildForm()
    {
        $columns = Setting::getColumns();
        foreach ($columns as $column) {
            if (in_array($column['type'], ['image', 'file'])) {
                $this->add($column['key'], 'file', [
                    'label' => trans('admin.settings.' . $column['key']),
                    'default_value' => Setting::get($column['key']),
                    'help_block' => [
                        'text' => ($column['type'] == 'image' ? '<img width="200px" src="' : base_path()) . '/images/setting/' . $column['value'] . ($column['type'] == 'image' ? '">' : ''),
                        'tag' => 'p',
                        'attr' => ['class' => 'help-block']
                    ]
                ]);
            } else {
                $this->add($column['key'], $column['type'], [
                    'label' => trans('admin.settings.' . $column['key']),
                    'default_value' => Setting::get($column['key'])
                ]);
            }
        };
        $this
            ->add('SaveAndReload', 'submit', [
                'label' => '<span class="btn-label"> <i class="fa fa-check"></i> </span>&nbsp;&nbsp;' . trans('admin.submit'),
                'attr' => [
                    'class' => 'btn btn-labeled btn-success m-b-5',
                    'value' => 'SaveAndReload',
                    'name' => 'action'
                ]
            ]);
    }

}