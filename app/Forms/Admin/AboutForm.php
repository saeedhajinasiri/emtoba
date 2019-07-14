<?php

namespace App\Forms\Admin;

use App\Category;
use App\Tag;

class AboutForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('content', 'textarea', [
                'attr' => [
                    'class' => 'form-control editor'
                ]
            ]);

        parent::buildForm();
    }
}
