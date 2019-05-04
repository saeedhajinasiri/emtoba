<?php

namespace App\Forms\Admin;

use App\Category;

class VideoForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('slug', 'text')
            ->add('video_url', 'text')
            ->add('content', 'textarea', [
                'attr' => [
                    'class' => 'form-control editor'
                ]
            ])
            ->add('image', 'file', [
                'attr' => [
                    'class' => ''
                ]
            ])
            ->add('category_list', 'choice', [
                'label' => 'Categories',
                'choices' => $this->getCategories(),
                'expanded' => false,
                'multiple' => true,
                'attr' => [
                    'id' => 'category_list'
                ]
            ])
            ->add('published_at', 'text', [
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control ltr'
                ]
            ])
            ->add('featured', 'checkbox', [
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'State On',
                    'data-off' => 'State Off',
                    'checked' => isset($this->featured) ? $this->featured : false
                ]
            ])
            ->add('meta_keywords', 'textarea')
            ->add('meta_description', 'textarea');

        parent::buildForm();
    }

    protected function getCategories()
    {
        return Category::where('category_name', 'blog')->first()->descendants()->get()->pluck('dashedTitle', 'id')->toArray();
    }
}
