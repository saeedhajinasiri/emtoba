<?php

namespace App\Forms\Admin;

class LessonForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('url', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('file', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ]);

        parent::buildForm();
    }
}
