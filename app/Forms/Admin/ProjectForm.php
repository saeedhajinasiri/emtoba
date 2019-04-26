<?php

namespace App\Forms\Admin;

use App\Category;
use App\Enums\EInventoryStatus;

class ProjectForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'label' => trans('admin.projects.title'),
            ])
            ->add('page_title', 'text', [
                'label' => trans('admin.projects.page_title'),
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('slug', 'text', [
                'label' => trans('admin.projects.slug'),
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('category_list', 'choice', [
                'label' => trans('admin.projects.categories'),
                'choices' => $this->getCategories(),
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control rtl',
                    'id' => 'category_list'
                ]
            ])
            ->add('content', 'textarea', [
                'label' => trans('admin.projects.content'),
            ])
            ->add('abstract', 'textarea', [
                'label' => trans('admin.projects.abstract'),
            ])
            ->add('video_description', 'textarea', [
                'label' => trans('admin.projects.video_description'),
            ])
            ->add('image', 'file', [
                'label' => trans('admin.projects.image'),
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('video_url', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                ],
                'label' => trans('admin.projects.video_url'),
            ])
            ->add('video_cover', 'file', [
                'label' => trans('admin.projects.video_cover'),
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('published_at', 'text', [
                'attr' => [
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('architects', 'text', [
                'label' => trans('admin.projects.architects'),
            ])
            ->add('architects_url', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                ],
                'label' => trans('admin.projects.architects_url'),
            ])
            ->add('location', 'text', [
                'label' => trans('admin.projects.location'),
            ])
            ->add('location_url', 'text', [
                'attr' => [
                    'class' => 'form-control ltr',
                ],
                'label' => trans('admin.projects.location_url'),
            ])
            ->add('employer', 'text', [
                'label' => trans('admin.projects.employer'),
            ])
            ->add('project_year', 'text', [
                'label' => trans('admin.projects.project_year'),
            ])
            ->add('dimension', 'text', [
                'label' => trans('admin.projects.dimension'),
            ])
            ->add('length', 'text', [
                'label' => trans('admin.projects.length'),
            ])
            ->add('featured', 'checkbox', [
                'label' => trans('admin.projects.featured'),
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => trans('admin.state_on'),
                    'data-off' => trans('admin.state_off'),
                    'checked' => isset($this->featured) ? $this->featured : false
                ]
            ])
            ->add('meta_keywords', 'textarea', [
                'label' => trans('admin.projects.meta_keywords'),
            ])
            ->add('meta_description', 'textarea', [
                'label' => trans('admin.projects.meta_description'),
            ]);

        parent::buildForm();
    }

    protected function getCategories()
    {
        return Category::where('id', 3)->first()->descendants()->get()->pluck('dashedTitle', 'id')->toArray();
    }

    private function getInventoryStatuses()
    {
        return EInventoryStatus::transFlip('admin.projects.');
    }
}
