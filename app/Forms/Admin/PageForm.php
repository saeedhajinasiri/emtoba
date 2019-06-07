<?php

namespace App\Forms\Admin;

class PageForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('slug', 'text')
            ->add('content', 'textarea')
            ->add('image', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('keywords', 'textarea')
            ->add('description', 'textarea')
            ->add('page_name', 'text');

        parent::buildForm();
    }

}
