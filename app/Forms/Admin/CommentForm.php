<?php

namespace App\Forms\Admin;

use App\Enums\ECommentType;
use App\Comment;

class CommentForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('status', 'choice', [
                'label' => 'status',
                'choices' => $this->getStatus(),
                'expanded' => false,
                'multiple' => false,
            ])
            ->add('content', 'textarea')
            ->add('title', 'text')
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
            ECommentType::pending => trans('admin.pending'),
            ECommentType::approved => trans('admin.approved'),
            ECommentType::rejected => trans('admin.rejected'),
        ];
    }

}
