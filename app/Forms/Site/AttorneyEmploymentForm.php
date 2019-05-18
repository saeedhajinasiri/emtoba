<?php

namespace App\Forms\Site;

use Kris\LaravelFormBuilder\Form;

class AttorneyEmploymentForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => trans('site.contacts.first_name')
                ]
            ])
            ->add('last_name', 'text', [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => trans('site.contacts.last_name')
                ]
            ])
            ->add('birth_certificate_number', 'text', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.birth_certificate_number')
                ]
            ])
            ->add('national_code', 'text', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.national_code')
                ]
            ])
            ->add('birth_place', 'text', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.birth_place')
                ]
            ])
            ->add('email', 'text', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.email')
                ]
            ])
            ->add('phone', 'text', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.phone')
                ]
            ])
            ->add('mobile', 'text', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.mobile')
                ]
            ])
            ->add('image', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('address', 'textarea', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.address')
                ]
            ])
            ->add('description', 'textarea', [
                'attr' => [
                    'class' => '',
                    'placeholder' => trans('site.contacts.description')
                ]
            ]);
    }
}
