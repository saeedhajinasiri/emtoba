<?php

namespace App\Forms\Admin;

class DepartmentForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('state', 'checkbox', [
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'Status On',
                    'data-off' => 'Status Off',
                ]
            ])
            ->add('title', 'text')
            ->add('content', 'textarea');

        parent::buildForm();
    }

}
