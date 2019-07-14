<?php

namespace App\Forms\Admin;

use App\Enums\EGenderType;
use Kris\LaravelFormBuilder\Form;

class AttorneyEmploymentForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'label' => trans('site.contacts.first_name'),
                'attr' => [
                    'placeholder' => trans('site.contacts.first_name'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('last_name', 'text', [
                'label' => trans('site.contacts.last_name'),
                'attr' => [
                    'placeholder' => trans('site.contacts.last_name'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('gender', 'choice', [
                'label' => trans('site.contacts.gender'),
                'choices' => $this->getGenders(),
                'attr' => [
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('birth_certificate_number', 'text', [
                'label' => trans('site.contacts.birth_certificate_number'),
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.birth_certificate_number'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('national_code', 'text', [
                'label' => trans('site.contacts.national_code'),
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.national_code'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('birth_place', 'text', [
                'label' => trans('site.contacts.birth_place'),
                'attr' => [
                    'placeholder' => trans('site.contacts.birth_place'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('email', 'text', [
                'label' => trans('site.contacts.email'),
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.email'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('phone', 'text', [
                'label' => trans('site.contacts.phone'),
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.phone'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('mobile', 'text', [
                'label' => trans('site.contacts.mobile'),
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.mobile'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('image', 'file', [
                'label' => trans('site.contacts.image'),
                'attr' => [
                    'class' => '',
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('address', 'textarea', [
                'label' => trans('site.contacts.address'),
                'attr' => [
                    'placeholder' => trans('site.contacts.address'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ])
            ->add('description', 'textarea', [
                'label' => trans('admin.contacts.resume'),
                'attr' => [
                    'placeholder' => trans('site.contacts.description'),
                    'readonly' => 'readonly',
                    'disabled' => 'disabled'
                ]
            ]);
    }

    private function getGenders()
    {
        return EGenderType::transFlip('site.genders.');
    }
}
