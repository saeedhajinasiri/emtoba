<?php

namespace App\Forms\Admin;

use App\Location;
use App\Role;

class UserForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('email', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('username', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('password', 'text')
            ->add('password_confirmation', 'text')
            ->add('avatar', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('address', 'textarea')
            ->add('mobile', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('role_list', 'choice', [
                'choices' => $this->getRoles(),
                'multiple' => true,
                'expanded' => true
            ])
            ->add('location_id', 'choice', [
                'choices' => $this->getLocationIds(),
                'attr' => [
                    'id' => 'location_id',
                    'class' => 'form-control ltr'
                ]
            ]);

        parent::buildForm();
    }

    public function getRoles()
    {
        return Role::orderBy('id', 'DESC')->pluck('name', 'id')->toArray();
    }

    private function getLocationIds()
    {
        return Location::root()->descendantsAndSelf()->get()->pluck('dashedTitle', 'id')->toArray();
    }
}
