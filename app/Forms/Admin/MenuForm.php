<?php

namespace App\Forms\Admin;

class MenuForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('slug', 'text')
            ->add('route', 'text')
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
