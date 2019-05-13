<?php

namespace App\Forms\Admin;

class DepartmentForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('content', 'textarea');

        parent::buildForm();
    }

}
