<?php

namespace App\Forms\Admin;

class CategoryForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('slug', 'text')
            ->add('parent_id', 'text', [
                'attr' => [
                    'class' => 'form-control hidden',
                    'id' => 'parent_id'
                ]
            ])
            ->add('description', 'textarea')
            ->add('meta_keywords', 'textarea')
            ->add('meta_description', 'textarea');

        parent::buildForm();
    }

}
