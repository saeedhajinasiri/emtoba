<?php

namespace App\Forms\Admin;

class TestimonialForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => trans('admin.teams.name'),
            ])
            ->add('content', 'textarea', [
                'label' => trans('admin.teams.content'),
            ])
            ->add('image', 'file', [
                'label' => trans('admin.teams.image'),
                'attr' => [
                    'class' => ''
                ]
            ]);

        parent::buildForm();
    }
}
