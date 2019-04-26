<?php

namespace App\Forms\Admin;

use App\Enums\ELinkType;

class TeamForm extends AdminForm
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
            ->add('job', 'text', [
                'label' => trans('admin.teams.job'),
            ])
            ->add('image', 'file', [
                'label' => trans('admin.teams.image'),
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('email', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('facebook', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('instagram', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('twitter', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('linkedin', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ]);

        parent::buildForm();
    }

    private function getTypes()
    {
        return ELinkType::transFlip('site.links.');
    }

}
