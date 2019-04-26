<?php

namespace App\Forms\Admin;

class LocationForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title_fa', 'text')
            ->add('title_en', 'text')
            ->add('slug', 'text')
            ->add('slug_fa', 'text')
            ->add('parent_id', 'text', [
                'attr' => [
                    'class' => 'form-control hidden',
                    'id' => 'parent_id'
                ]
            ])
            ->add('description', 'textarea');

        parent::buildForm();
    }

}
