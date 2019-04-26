<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Form;

class AdminForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('state', 'checkbox', [
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => trans('admin.state_on'),
                    'data-off' => trans('admin.state_off'),
                    'checked' => isset($this->state) ? $this->state : false
                ]
            ])
            ->add('SaveAndReload', 'submit', [
                'label' => '<span class="btn-label"> <i class="fa fa-check"></i> </span>&nbsp;&nbsp;' . trans('admin.submit'),
                'attr' => [
                    'class' => 'btn btn-labeled btn-success m-b-5',
                    'value' => 'SaveAndReload',
                    'name' => 'action'
                ]
            ])
            ->add('SaveAndClose', 'submit', [
                'label' => '<span class="btn-label"> <i class="glyphicon glyphicon-ok"></i> </span>&nbsp;&nbsp;' . trans('admin.saveAndClose'),
                'attr' => [
                    'class' => 'btn btn-labeled btn-primary m-b-5',
                    'value' => 'SaveAndClose',
                    'name' => 'action'
                ]
            ])
            ->add('SaveAndShow', 'submit', [
                'label' => '<span class="btn-label"> <i class="glyphicon glyphicon-ok"></i> </span>&nbsp;&nbsp;' . trans('admin.SaveAndShow'),
                'attr' => [
                    'class' => 'btn btn-labeled btn-primary m-b-5',
                    'value' => 'SaveAndShow',
                    'name' => 'action'
                ]
            ])
            ->add('SaveAndNew', 'submit', [
                'label' => '<span class="btn-label"> <i class="glyphicon glyphicon-ok"></i> </span>&nbsp;&nbsp;&nbsp;&nbsp;' . trans('admin.SaveAndNew'),
                'attr' => [
                    'class' => 'btn btn-labeled btn-primary m-b-5',
                    'value' => 'SaveAndNew',
                    'name' => 'action'
                ]
            ]);
    }
}
