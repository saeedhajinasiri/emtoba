<?php

namespace App\Forms\Admin;

class RoleForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('display_name', 'text')
            ->add('description', 'textarea');
        parent::buildForm();
    }
}
