<?php

namespace App\Forms\Site;

use App\Enums\EGenderType;
use Kris\LaravelFormBuilder\Form;

class EmployeeForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'attr' => [
                    'placeholder' => trans('site.contacts.first_name')
                ]
            ])
            ->add('last_name', 'text', [
                'attr' => [
                    'placeholder' => trans('site.contacts.last_name')
                ]
            ])
            ->add('gender', 'choice', [
                'choices' => $this->getGenders(),
            ])
            ->add('birth_certificate_number', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.birth_certificate_number')
                ]
            ])
            ->add('national_code', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.national_code')
                ]
            ])
            ->add('birth_place', 'text', [
                'attr' => [
                    'placeholder' => trans('site.contacts.birth_place')
                ]
            ])
            ->add('email', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.email')
                ]
            ])
            ->add('phone', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.phone')
                ]
            ])
            ->add('mobile', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
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
                    'placeholder' => trans('site.contacts.address')
                ]
            ])
            ->add('description', 'textarea', [
                'attr' => [
                    'placeholder' => trans('site.contacts.description')
                ]
            ]);
    }

    private function getGenders()
    {
        return EGenderType::transFlip('site.genders.');
    }
}
