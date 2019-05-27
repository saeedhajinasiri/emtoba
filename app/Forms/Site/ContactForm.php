<?php

namespace App\Forms\Site;

use App\Department;
use App\Enums\EState;
use Kris\LaravelFormBuilder\Form;

class ContactForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('full_name', 'text', [
                'attr' => [
                    'placeholder' => trans('site.contacts.full_name')
                ]
            ])
            ->add('email', 'text', [
                'attr' => [
                    'placeholder' => trans('site.contacts.email')
                ]
            ])
            ->add('department_id', 'choice', [
                'label' => 'Departments',
                'choices' => $this->getDepartments(),
                'expanded' => false,
                'multiple' => false,
                'attr' => [
                    'id' => 'department_id'
                ]
            ])
            ->add('subject', 'text', [
                'attr' => [
                    'placeholder' => trans('site.contacts.subject')
                ]
            ])
            ->add('content', 'textarea', [
                'attr' => [
                    'placeholder' => trans('site.contacts.content')
                ]
            ]);
    }

    protected function getDepartments()
    {
        return Department::query()->whereState(EState::enabled)->get()->pluck('title', 'id')->toArray();
    }

}
