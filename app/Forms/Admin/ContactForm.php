<?php

namespace App\Forms\Admin;

class ContactForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('subject', 'text', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('content', 'textarea', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('reply', 'textarea')
            ->add('department_title', 'text', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('user_name', 'text', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('user_email', 'text', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('user_ip', 'text', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ]);

        parent::buildForm();
    }

}
