<?php

namespace App\Forms\Admin;

class BrandForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title_fa', 'text')
            ->add('title_en', 'text')
            ->add('slug', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('content', 'textarea')
            ->add('image', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ]);

        parent::buildForm();
    }
}
