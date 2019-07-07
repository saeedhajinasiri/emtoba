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
                'label' => trans('admin.status'),
                'choices' => $this->getStatus(),
                'expanded' => false,
                'multiple' => false,
            ])
            ->add('content', 'textarea', [
                'label' => trans('admin.comments.content'),
            ])
            ->add('title', 'text', [
                'label' => trans('admin.comments.title'),
            ])
            ->add('commentable_section', 'text', [
                'label' => trans('admin.comments.commentable_section'),
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('commentable_title', 'text', [
                'label' => trans('admin.comments.commentable_title'),
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('user_name', 'text', [
                'label' => trans('admin.comments.user_name'),
            ])
            ->add('user_email', 'text', [
                'label' => trans('admin.comments.user_email'),
            ])
            ->add('user_website', 'text', [
                'label' => trans('admin.comments.user_website'),
            ])
            ->add('user_ip', 'text', [
                'label' => trans('admin.comments.user_ip'),
            ])
            ->add('parent_title', 'text', [
                'label' => trans('admin.comments.parent_title'),
                'attr' => [
                    'readonly' => 'readonly'
                ]
            ])
            ->add('likes_count', 'text', [
                'label' => trans('admin.comments.likes_count'),
            ])
            ->add('dislikes_count', 'text', [
                'label' => trans('admin.comments.dislikes_count'),
            ])
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
