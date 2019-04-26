<?php

namespace App\Forms\Site;

use Kris\LaravelFormBuilder\Form;

class ContactForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('full_name', 'text', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.fullname')
                ]
            ])
            ->add('email', 'text', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.email')
                ]
            ])
            ->add('subject', 'text', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.subject')
                ]
            ])
            ->add('content', 'textarea', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.content')
                ]
            ]);
    }
}
