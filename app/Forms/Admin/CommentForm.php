<?php

namespace App\Forms\Admin;

use App\Comment;

class CommentForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('state', 'checkbox', [
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'Status On',
                    'data-off' => 'Status Off',
                ]
            ])
            ->add('status', 'choice', [
                'label' => 'status',
                'choices' => $this->getStatus(),
                'expanded' => false,
                'multiple' => false,
            ])
            ->add('content', 'textarea')
            ->add('commentable_section', 'text', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('commentable_title', 'text', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('user_name', 'text')
            ->add('user_email', 'text')
            ->add('user_website', 'text')
            ->add('user_ip', 'text')
            ->add('parent_title', 'text', [
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('likes_count', 'text')
            ->add('dislikes_count', 'text')
        ;

        parent::buildForm();
    }

    public function getStatus() {
        return [
            Comment::pending => trans('admin.pending'),
            Comment::approved => trans('admin.approved'),
            Comment::rejected => trans('admin.rejected'),
        ];
    }

}
