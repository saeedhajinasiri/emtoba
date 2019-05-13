<?php

namespace App\Forms\Admin;

class BranchForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('name', 'text')
            ->add('tel', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                ]
            ])
            ->add('fax', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                ]
            ])
            ->add('website', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                ]
            ])
            ->add('email', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                ]
            ])
            ->add('address', 'textarea')
            ->add('image', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ]);

        parent::buildForm();
    }

}
