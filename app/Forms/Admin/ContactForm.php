<?php

namespace App\Forms\Admin;

class ContactForm extends AdminForm
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
            ->add('content', 'textarea')
            ->add('department_title', 'text', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('user_name', 'text')
            ->add('user_email', 'text')
            ->add('user_ip', 'text');

        parent::buildForm();
    }

}
