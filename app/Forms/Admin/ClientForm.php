<?php

namespace App\Forms\Admin;

class ClientForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => trans('admin.clients.name'),
            ])
            ->add('content', 'textarea', [
                'label' => trans('admin.clients.content'),
            ])
            ->add('job', 'text', [
                'label' => trans('admin.clients.job'),
            ])
            ->add('image', 'file', [
                'label' => trans('admin.clients.image'),
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('email', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('facebook', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('instagram', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('twitter', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('linkedin', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ]);

        parent::buildForm();
    }
}
