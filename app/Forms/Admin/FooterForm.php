<?php

namespace App\Forms\Admin;

use App\Enums\EFooterType;

class FooterForm extends AdminForm
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
            ->add('type', 'choice', [
                'choices' => $this->getTypes(),
            ]);

        parent::buildForm();
    }

    private function getTypes()
    {
        return EFooterType::transFlip('site.links.');
    }

}
