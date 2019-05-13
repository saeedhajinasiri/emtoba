<?php

namespace App\Forms\Admin;

use App\Job;

class PartnerForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('scientific_records', 'textarea', [
                'attr' => [
                    'class' => 'form-control editor'
                ]
            ])
            ->add('social_records', 'textarea', [
                'attr' => [
                    'class' => 'form-control editor'
                ]
            ])
            ->add('image', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('job_list', 'choice', [
                'label' => 'Jobs',
                'choices' => $this->getJobs(),
                'expanded' => false,
                'multiple' => false,
                'attr' => [
                    'id' => 'job_list'
                ]
            ]);

        parent::buildForm();
    }

    protected function getJobs()
    {
        return Job::all()->pluck('title', 'title')->toArray();
    }

}
