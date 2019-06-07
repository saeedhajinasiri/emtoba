<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Forms\Admin\CommentForm;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CommentsController extends AdminController
{
    protected $section = 'comments';
    protected $form = CommentForm::class;
    protected $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response

    public function show($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Comment $comment)
    {
        $input = $request->all();

        $comment->update($input);

        Flash::info(trans('admin.update_is_successfully'));
        return $this->redirectToAction($request->get('action'), $comment);
    }

}
