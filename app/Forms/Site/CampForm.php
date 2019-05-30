<?php

namespace App\Forms\Site;

use App\Enums\EGenderType;
use Kris\LaravelFormBuilder\Form;

class CampForm extends Form
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
            ->add('national_code', 'text', [
                'attr' => [
                    'placeholder' => trans('site.contacts.national_code')
                ]
            ])
            ->add('image', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('father_name', 'text', [
                'attr' => [
                    'placeholder' => trans('site.contacts.father_name')
                ]
            ])
            ->add('email', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.email')
                ]
            ])
            ->add('gender', 'choice', [
                'choices' => $this->getGenders(),
            ])

            ->add('birth_date', 'text', [
                'attr' => [
                    'id' => 'birth_date',
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.birth_date')
                ]
            ])
            ->add('tel', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.tel')
                ]
            ])
            ->add('mobile', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                    'placeholder' => trans('site.contacts.mobile')
                ]
            ])
            ->add('address', 'textarea', [
                'attr' => [
                    'placeholder' => trans('site.contacts.address')
                ]
            ])
            ->add('postal_code', 'text', [
                'attr' => [
                    'placeholder' => trans('site.contacts.postal_code')
                ]
            ]);
    }

    private function getGenders()
    {
        return EGenderType::transFlip('site.genders.');
    }
}
