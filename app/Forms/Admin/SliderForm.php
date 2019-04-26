<?php

namespace App\Forms\Admin;

use App\Enums\ELinkType;

class SliderForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('link', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('content', 'textarea')
            ->add('subtitle', 'text')
            ->add('image', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('published_at', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ]);

        parent::buildForm();
    }
}
